<?php
App::uses('ApiController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Common');

    public $uses = array('User', 'SnsUser', 'UserParam', 'Item', 'UserItem', 'ItemEffect', 'ItemGroup', 'PaymentLog', 'UserFirstItem');

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        $fields = array();
        $where  = array('Item.point > ' => 0);
        $list = $this->Item->getAllFind($where, $fields);

        $where = array('user_id' => $this->userId);
        $ret = $this->UserFirstItem->getAllFind($where, $fields, 'first');
        if (!empty($ret)) {
            foreach ($list as $key => $val) {
                if ($val['item_id'] == FIRST_ITEM_ID) 
                    unset($list[$key]);
            }
        }

        $this->set('list', $list);
	}

    /**
     * conf method
     *
     * @author imanishi 
     */
	public function conf($itemId) {

        $fields = array();
        $where  = array('item_id' => $itemId);
        $data = $this->Item->getAllFind($where, $fields, 'first');


        // 購入が確定した際の通知先URL
        $callbackUrl = BASE_URL . "Items/comp?uxid=". $this->userId;

        // 購入が完了した後の戻り先URL
        $finishPageUrl = BASE_URL . "Items/end?item_id=" . $itemId;

        // 購入アイテムの配列（複数のアイテム指定可）
        // アイテム名や説明文はUTF-8
        $items = array();
        // SNSクラス生成
        if ( 'hills' == PLATFORM_ENV ) {

            $this->snsUtil = ApplihillsUtil::create();

            $items[] = array(
              "itemId"      => $data['item_id'],
              "name"        => $data['item_name'],
              "unitPrice"   => $data['point'],
              "quantity"    => 1,
              "imageUrl"    => IMG_URL . 'item/item_' . $data['item_id'] . '.png',
              "description" => $data['item_detail'],
            );

        } elseif ( 'waku' == PLATFORM_ENV ) {

            $this->snsUtil = WakuUtil::create();

            $items[] = array(
              "itemId"      => $data['item_id'],
              "name"        => $data['item_name'],
              "unitPrice"   => $data['point'],
              "amount"    => 1,
              "imageUrl"    => IMG_URL . 'item/item_' . $data['item_id'] . '.png',
              "description" => $data['item_detail'],
            );

        } elseif ( 'niji' == PLATFORM_ENV ) {

            $this->snsUtil = NijiUtil::create();

            $items[] = array(
              "itemId"      => $data['item_id'],
              "name"        => $data['item_name'],
              "unitPrice"   => $data['point'],
              "quantity"    => 1,
              "imageUrl"    => IMG_URL . 'item/item_' . $data['item_id'] . '.png',
              "description" => $data['item_detail'],
            );

        }

        $payment = $this->snsUtil->createPayment($callbackUrl, $finishPageUrl, $items);

        if ($payment) {
            // 決済ID（Paymentオブジェクトごとに割り当てられます）
            if ( 'waku' == PLATFORM_ENV ) {
                $paymentId = $payment['entry'][0]["paymentId"];
                $endpoint  = $payment['endpointUrl'];
            } else {
                $paymentId = $payment["paymentId"];
                $endpoint  = $payment['transactionUrl'];
            }

            $itemLog = json_encode($items);

            // 購入情報（Payment IDとアイテム情報を結びつけたもの）をデータベース等に保存
            $this->PaymentLog->begin();
            try {
                $values = array(
                              'payment_id' => $paymentId
                          ,   'user_id'   => $this->userId
                          ,   'log'       => $itemLog
                          );
                $this->PaymentLog->save($values);

                
            } catch (AppException $e) { 
                $this->UserParam->rollback(); 
                $this->log($e->errmes);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
            $this->PaymentLog->commit();

            // アイテム購入ページへリダイレクト
            header("Location: " . $endpoint , true, 302);
            exit;
        } else {
            // 失敗した時の処理
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }
	}

    /**
     * comp
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $this->autoRender = false;   // 自動描画をさせない

        $userId = $this->params['uxid'];
        if (empty($userId)) {
            // 不正
            $this->log(__FILE__ . __LINE__ . ': itemCompError');
            header("HTTP/1.1 400 NG"); 
            echo "NG";
            die;
        }

        // applihillsはopensocial_owner_idの付与が正しくない為
        $this->userId = $userId;

        // 最新ログ取得
        $latestData = $this->PaymentLog->getLatestData($this->userId);
        if (empty($latestData)) {
            $this->UserParam->rollback(); 
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        }
        $items = $latestData['log'];
        $items = json_decode($items);
        $items[0] = (array)$items[0];

        $paymentId = $latestData['payment_id']; 
        $appId = null;
        if (!empty($this->params['opensocial_app_id'])) {
            $appId = $this->params['opensocial_app_id'];
        }


        $where = array('user_id' => $userId);
        $ownerId = $this->User->field('sns_user_id', $where);

        $payment   = $this->snsUtil->getPayment($paymentId, $ownerId, $appId); 
        if ( 'waku' == PLATFORM_ENV ) {
            $column = 'entry';
        } else {
            $column = 'paymentEntries';
        }
        $err = 0;
        foreach ($payment[$column] as $key => $val) {
            if ( $items[$key]['itemId'] != $val['itemId'] ) {
                $err = 1;
                break;
            }
            $itemId = $val['itemId'];
            break;
        }

        if ($err == 1) {
            // 直近で購入したアイテムではない
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        }

        $field = array();
        $where = array('item_id' => $itemId);
        $itemData = $this->Item->getAllFind($where, $field, 'first');
        if (empty($itemData)) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }

        if ( 0 == $itemData['box_num'] ) 
            $itemData['box_num'] = 1;

        // セットアイテムチェック
        $where = array('item_id' => $itemData['item_id']);
        $itemGroup = $this->ItemGroup->getAllFind($where, $field);

        $newItemIds = array();

        if (empty($itemGroup)) {
            $newItemIds[] = $itemData['item_id']; 
        } else {
            foreach ($itemGroup as $val) {
                $newItemIds[] = $val['item_base_id'];
            }
        }

        $this->UserItem->begin();
        foreach ($newItemIds as $newItemId) {
            // 存在確認
            $where = array(
                        'user_id'  => $this->userId  
                    ,   'item_id'  => $newItemId
                    );
            $userItem = $this->UserItem->getAllFind($where,$field, 'first');

            try {

                if (empty($userItem)) {

                    $data     = array();
                    $fields   = array('user_id', 'item_id', 'num');
                    $data[]   = array($this->userId, $newItemId, $itemData['box_num']);
                    $this->UserItem->insertBulk( $fields , $data );
                } else {

                    $addNum = $userItem['num'] + $itemData['box_num'];
            
                    $value = array(
                                 'num'      => $addNum
                             ,   'modified' => NOW_DATE_DB
                             );
                    $where = array(
                                'id' => $userItem['id']
                            );
                    $this->UserItem->updateAll($value, $where);
                }


            } catch (AppException $e) { 
                $this->UserItem->rollback(); 
                $this->log($e->errmes);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
        }

        // 初回限定アイテム
        if (FIRST_ITEM_ID == $itemId) {
            $where = array(
                'user_id' => $this->userId 
            );
            $ret = $this->UserFirstItem->getAllFind($where);
            if (!empty($ret)) {
                // 不正
                $this->UserItem->rollback(); 
                $this->log(__FILE__.__LINE__.':userId;'.$this->userId);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            }

            $value = array(
                'user_id' => $this->userId
            );
            $this->UserFirstItem->save($value);
        }

        // endFlg
        $value = array(
            'id' => $latestData['id']
        ,   'end_flg' => 1
        );
        $this->PaymentLog->save($value);

        $this->UserItem->commit();

        header("HTTP/1.1 200 OK"); 
        echo "OK";
    }

    /**
     * end
     *
     * @author imanishi
     * @return void
     */
    public function end() {
   
        // 最新ログ取得
        $latestData = $this->PaymentLog->getLatestData($this->userId, $endFlg = 1);
        $log = json_decode($latestData['log']);
        $itemData = (array)$log[0];

        $where = array('item_id' => $itemData['itemId']);
        $field = array();
        $data = $this->Item->getAllFind($where, $field, 'first');
        $itemGroup = $this->ItemGroup->getAllFind($where , $field, 'first');
        if (!empty($itemGroup['item_base_id'])) {
            $itemId = $itemGroup['item_base_id'];
        } else {
            $itemId = $itemData['itemId'];
        }

        $where = array(
                     'user_id' => $this->userId
                 ,   'item_id' => $itemId
                 );
        $userItem = $this->UserItem->getAllFind($where, $field, 'first');
        if (empty($userItem['num'])) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }

        $this->set('data',  $data);
        $this->set('userItemId',  $userItem['id']);
    }

}
