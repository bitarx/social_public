<?php
App::uses('ApiController', 'Controller');
/**
 * Gachas Controller
 *
 * @property Gacha $Gacha
 * @property PaginatorComponent $Paginator
 */
class GachasController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Common', 'GachaFunc');

    public $uses = array('User', 'SnsUser', 'Gacha', 'GachaProb', 'UserCard', 'Card', 'UserGachaLog', 'PaymentLog', 'UserItem', 'UserCollect', 'UserPresentBox', 'UserQueryString');

    // 10連ガチャID
    public $gacha10 = array( GACHA_10_ID );

    // 無課金ガチャID
    public $gachaFree = array( GACHA_MONEY_ID );


    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $tNum = $this->UserItem->hasPremiumGachaTiket($this->userId);

        $list = $this->Gacha->getList();
        foreach ($list as &$val) {
            if ($val['gacha_id'] == GACHA_10_ID ) {
                $ret = $this->UserGachaLog->isGacha10($this->userId);
                if (!$ret) {
                    $val['point'] /= 2;
                }
            }
        }
        $queryString = "";
        if ('niji' == PLATFORM_ENV) {
            $queryString = $this->UserQueryString->getQueryString($this->ownerId);
        }

        $this->set('list', $list);
        $this->set('tNum', $tNum);
        $this->set('queryString', $queryString);
	}

    /**
     * ガチャ実行
     *
     * @author imanishi
     * @return void
     */
    public function act() {

        $gachaId = $this->params['gacha_id'];

        if (empty($gachaId)) {
            // 選択がない
            $this->log(__FILE__ . __LINE__ . ':userId;'. $this->userId);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION ));
        }

        $where = array('gacha_id' => $gachaId );
        $gachaData = $this->Gacha->getAllFind($where, array(), 'first');

        $probList = $this->GachaProb->getGachaProbList ($gachaId);
        if (empty($probList)) {
            // データがない
            $this->log(__FILE__ . __LINE__ . ':No Data ProbList:userId;'. $this->userId);
            return $this->rd('Gachas', 'index', array('error'=> ERROR_ID_BAD_OPERATION ));
        }

        $gacha10 = 0;

        if (in_array($gachaId, $this->gacha10)) $gacha10 = 1;

        $gachaFree = 0;
        if (in_array($gachaId, $this->gachaFree)) $gachaFree = 1;
        
        // カード所持数確認
        $num = empty($gacha10) ? 1 : 10;
        $hasMaxFlg = $this->UserCard->judgeMaxCardCnt($this->userId, $minus = $num);


        // プレミアムガチャチケット判定
        $tNum = 0;
        if ($gachaId == GACHA_PREMIUM_ID) {
            $tNum = $this->UserItem->hasPremiumGachaTiket($this->userId);
        }

        // チケット保有がない課金ガチャ
        if ( empty($tNum) && 0 == $gachaFree ) {

            $rareLevel = 1;

            // 抽選だけ先に行う
            for ($i = 1; $i <= $num; $i++) {
                $data = $this->Common->doLot($probList);

                $cardData = $this->Card->getCardData($data['card_id']);

                // ログリスト
                $logList[] = array(
                    $this->userId 
                ,   $gachaId
                ,   $cardData['card_id']
                );

                if ($rareLevel < $cardData['rare_level']) {
                    $rareLevel = $cardData['rare_level'];
                }
            }

            // 抽選結果保存
            $this->UserGachaLog->begin();
            try {
                if (empty($gacha10)) {
                    // 単品ガチャ
                    $value = array(
                        'user_id'    => $this->userId
                    ,   'gacha_id'   => $gachaId    
                    ,   'card_id'    => $data['card_id']    
                    );
                    $this->UserGachaLog->save($value);
                } else {
                    // １０連ガチャ
                    $field = array('user_id', 'gacha_id', 'card_id');
                    $this->UserGachaLog->insertBulk($field, $logList);
                }

            } catch (AppException $e) {
                $this->UserParam->rollback();
                $this->log($e->errmes);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
            }
            $this->UserGachaLog->commit();


            /********************************************** 
             * 以下課金API
            ***********************************************/ 
            // アプリヒルズ側で購入が確定した際の通知先URL
            $callbackUrl = BASE_URL . "Gachas/comp?gacha_id=". $gachaId. '&uxid=' . $this->userId;

            // アプリヒルズ側で購入が完了した後の戻り先URL
            if (!empty($gacha10)) {
                // １０連ガチャ
                $finishPageUrl 
                    = BASE_URL . "Gachas/product10?rare_level=". $rareLevel. '&has_max_flg='. $hasMaxFlg;

                // 10連ガチャの初回割引
                $ret = $this->UserGachaLog->isGacha10($this->userId);
                if (empty($ret)) {
                    $gachaData['point'] /= 2;
                }
            } else {
                // 単品ガチャ
                $finishPageUrl 
                    = BASE_URL . "Gachas/product?rare_level=". $rareLevel . "&has_max_flg=" . $hasMaxFlg;
            }

            // タグ除去
            $gachaData['gacha_detail'] = strip_tags($gachaData['gacha_detail']);


            // 購入アイテムの配列（複数のアイテム指定可）
            // アイテム名や説明文はUTF-8
            $items = array();

            // SNSクラス生成
            if ( 'hills' == PLATFORM_ENV ) {

                $items[] = array(
                  "itemId"      => $gachaData['gacha_id'],
                  "name"        => $gachaData['gacha_name'],
                  "unitPrice"   => $gachaData['point'],
                  "quantity"    => 1,
                  "imageUrl"    => IMG_URL . 'gacha/icon_' . $gachaData['gacha_id'] . '.png',
                  "description" => $gachaData['gacha_detail'],
                );

            } elseif ( 'waku' == PLATFORM_ENV ) {

                $items[] = array(
                  "itemId"      => $gachaData['gacha_id'],
                  "name"        => $gachaData['gacha_name'],
                  "unitPrice"   => $gachaData['point'],
                  "amount"    => 1,
                  "imageUrl"    => IMG_URL . 'gacha/icon_' . $gachaData['gacha_id'] . '.png',
                  "description" => $gachaData['gacha_detail'],
                );

            } elseif ( 'niji' == PLATFORM_ENV ) {

                $items[] = array(
                  "itemId"      => $gachaData['gacha_id'],
                  "itemName"    => $gachaData['gacha_name'],
                  "unitPrice"   => $gachaData['point'],
                  "quantity"    => 1,
                  "imageUrl"    => IMG_URL . 'gacha/icon_' . $gachaData['gacha_id'] . '.jpg',
                  "description" => $gachaData['gacha_detail'],
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
                              ,   'log'       => json_encode($itemLog)
                              );
                    $this->PaymentLog->save($values);

                    
                } catch (AppException $e) { 
                    $this->UserParam->rollback(); 
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
                } 
                $this->PaymentLog->commit();

                // アイテム購入ページへリダイレクト
                header("Location: " . $endpoint, true, 302);
                exit;
            } else {
                // 失敗した時の処理
                $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
                $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM ));
            }
        } else {

            if ( 0 == $gachaFree ) {
                // チケット減算
                $tNum--;

                $this->UserItem->begin();
                try {
                    $value = array('num' => $tNum);
                    $where = array(
                        'UserItem.user_id' => $this->userId
                    ,   'UserItem.item_id' => PGACHA_ITEM_ID
                    );
                    $this->UserItem->updateAll($value, $where);

                } catch (AppException $e) {
                    $this->UserParam->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->UserItem->commit();
            }
        }


        // 以下の処理はチケットで回した場合と無課金ガチャの場合に通る

        $data = $this->Common->doLot($probList);

        $cardData = $this->Card->getCardData($data['card_id']);

        try {

            // カード所持最大未満の場合はカードテーブルへ
            if (empty($hasMaxFlg)) {
                $values = array(
                    'user_id' => $this->userId
                ,   'card_id' => $cardData['card_id']
                ,   'hp' => $cardData['card_hp']
                ,   'hp_max' => $cardData['card_hp']
                ,   'atk' => $cardData['card_atk']
                ,   'def' => $cardData['card_def']
                );
                $this->UserCard->save($values);
            } else {
                // カード所持最大の場合はプレゼントボックスへ
                $values = array();
                $values[] = array(
                    $this->userId
                ,   KIND_CARD
                ,   $cardData['card_id']
                ,   1
                ,   $gachaData['gacha_name'] . 'で入手'
                );
                $this->UserPresentBox->registPBox($values);
            }

            // 無料ガチャの場合はゴールド減算
            if (in_array($gachaId, $this->gachaFree)) {
                $money = $this->userParam['money'] - $gachaData['point'];
                $values = array(
                    'user_id' => $this->userId
                ,   'money'   => $money 
                );
                $this->UserParam->save($values);
            } else {
                if ($gachaData['gacha_id'] == GACHA_SOZAI_ID) {
                    $itemId = 14;
                } else {
                    $itemId = 6;
                }
                // 有料ガチャの場合はおまけを受け取りボックスへ
                $values = array();
                $values[] = array(
                    $this->userId
                ,   KIND_ITEM
                ,   $itemId 
                ,   1
                ,   $gachaData['gacha_name'] . 'のおまけ'
                );
                $this->UserPresentBox->registPBox($values);
            }

            // ログ記述
            $values = array(
                'user_id' => $this->userId 
            ,   'gacha_id' => $gachaId
            ,   'card_id'  => $cardData['card_id']
            ,   'end_flg'  => 1
            );
            $field = array('user_id', 'gacha_id', 'card_id', 'end_flg');
            $this->UserGachaLog->save($values);

            // コレクション登録
            $this->UserCollect->initCollect($this->userId, $cardData['card_id']);

            // ログリスト
            $logList[] = $values;

        } catch (AppException $e) {
            $this->UserCard->rollback();
            $this->log($e->errmes);
            exit;
        }

        $rareLevel = $cardData['rare_level'];


        // 演出へ
        $params = array(
            'rare_level'  => $rareLevel
        ,   'has_max_flg' => $hasMaxFlg
        );
        if (!empty($gacha10)) {
            // １０連ガチャ
            $this->rd('Gachas', 'product10', $params);
        } else {
            // 単品ガチャ
            $this->rd('Gachas', 'product', $params);
        }
    }

    /**
     * ガチャ演出
     *
     * @author imanishi
     * @return void
     */
    public function product() {


        // 共通レイアウトは使わない
        $this->layout = '';

        // キャンセル
        if (!empty($this->params['paymentId'])) {
            $where = array(
                'payment_id' => $this->params['paymentId']
            ,   'end_flg' => 1
            );
            $ret = $this->PaymentLog->field('id', $where);
            if (empty($ret)) {
                $this->rd('Gachas', 'index');
            }
        }

        // パラメータ取得
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        $hasMaxFlg = isset($this->params['has_max_flg']) ? $this->params['has_max_flg'] : false;
        $product = $this->GachaFunc->doProductLot($rareLevel);
        if (empty($rareLevel) || false === $hasMaxFlg) {
            $this->rd('Errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        // ベースカード
        $baseCard = IMG_URL . 'gacha/card.png';

        // 素材カード
        $target = IMG_URL . 'gacha/card.png';

        // 最終カード
        $afterCard = IMG_URL . 'gacha/card.png';

        // push開始ミリ秒
        $pushStartTime = 9000;
        if ( 5 == $rareLevel ) $pushStartTime = 10000;

        $this->set('product', $product);
        $this->set('time', time());
        $this->set('pushStartTime', $pushStartTime);
        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);
        $this->set('hasMaxFlg', $hasMaxFlg);
    }

    /**
     * ガチャ演出10連
     *
     * @author imanishi
     * @return void
     */
    public function product10() {

        // 共通レイアウトは使わない
        $this->layout = '';

        // キャンセル
        if (!empty($this->params['paymentId'])) {
            $where = array(
                'payment_id' => $this->params['paymentId']
            ,   'end_flg' => 1
            );
            $ret = $this->PaymentLog->field('id', $where);
            if (empty($ret)) {
                $this->rd('Gachas', 'index');
            }
        }

        // パラメータ取得
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        $hasMaxFlg = isset($this->params['has_max_flg']) ? $this->params['has_max_flg'] : false;
        if (empty($rareLevel) || false === $hasMaxFlg ) {
            $this->rd('UserCards', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        $product = $this->GachaFunc->doProductLot($rareLevel);

        // ベースカード
        $baseCard = IMG_URL . 'gacha/card.png';

        // 素材カード
        $target = IMG_URL . 'gacha/card.png';

        // 合成後カード
        $afterCard = IMG_URL . 'gacha/card_s.png';

        // push開始ミリ秒
        $pushStartTime = 9000;

        $this->set('product', $product);
        $this->set('pushStartTime', $pushStartTime);
        $this->set('time', time());
        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);
        $this->set('hasMaxFlg', $hasMaxFlg);

    }

    /**
     * ガチャ完了処理(課金処理が成功した場合のコールバック)
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $this->autoRender = false;   // 自動描画をさせない

        if ('waku' == PLATFORM_ENV) {
            $pidCol = 'payment_id';
        } else {
            $pidCol = 'paymentId';
        }

        $gachaId = $this->params['gacha_id'];
        $userId = $this->params['uxid'];
        $paymentId = $this->params[$pidCol];

        if (empty($gachaId) || empty($userId) || empty($paymentId)) {
            // 不正
            $this->log(__FILE__ . __LINE__ . ': gachaCompError');
            header("HTTP/1.1 400 NG"); 
            echo "NG";
            die;
        }

        // キャンセル
        if ('niji' == PLATFORM_ENV && isset($this->params['status']) && 3 <= $this->params['status']) {
            $this->log(__FILE__ . __LINE__ . ': gachaCancel');
            header("HTTP/1.1 400 NG"); 
            echo "NG";
            die;
        }

        // applihillsのopensocial_owner_idは正しくない為
        $this->userId = $userId;


        // 対象ログ取得
        $field = array();
        $where = array(
            'payment_id' => $paymentId
        ,   'user_id' => $this->userId
        ,   'end_flg' => 0
        );
        $latestData = $this->PaymentLog->getAllFind($where, $field, 'first');
        if (empty($latestData)) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
            header("HTTP/1.1 400 NG"); 
            echo "NG";
            die;
        }

        $paymentId = $latestData['payment_id'];

        $appId = null;
        if (!empty($this->params['opensocial_app_id'])) {
            $appId = $this->params['opensocial_app_id'];
        }


        $where = array('user_id' => $userId);
        $ownerId = $this->User->field('sns_user_id', $where);

        if ('waku' != PLATFORM_ENV) {
            $payment   = $this->snsUtil->getPayment($paymentId, $ownerId, $appId);
            if (empty($payment)) {

                // 購入処理が正常に行われていない 
                $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                header("HTTP/1.1 400 NG"); 
                echo "NG";
                die;
            }
        }

        $gacha10 = 0;
        if (in_array($gachaId, $this->gacha10)) $gacha10 = 1;
        
        $limit = empty($gacha10) ? 1: 10;
        $logList = $this->UserGachaLog->getGachaLogDataLatest($this->userId, $endFlg = 0, $limit);
        if (empty($logList)) {
            // ログがない
            $this->log(__FILE__ . __LINE__ . ':userId;'. $this->userId);
            header("HTTP/1.1 400 NG"); 
            echo "NG";
            die;
        }

        $where = array('gacha_id' => $gachaId );
        $gachaData = $this->Gacha->getAllFind($where, array(), 'first');

        
        // カード所持数確認
        $num = empty($gacha10) ? 1 : 10;
        $hasMaxFlg = $this->UserCard->judgeMaxCardCnt($this->userId, $minus = $num);

        $this->UserCard->begin();

        if (empty($gacha10)) {
            // 単品ガチャ
            $cardData = $this->Card->getCardData($logList[0]['card_id']);

            try {

                // カード所持最大未満の場合はカードテーブルへ
                if (empty($hasMaxFlg)) {
                    $values = array(
                        'user_id' => $this->userId
                    ,   'card_id' => $cardData['card_id']
                    ,   'hp' => $cardData['card_hp']
                    ,   'hp_max' => $cardData['card_hp']
                    ,   'atk' => $cardData['card_atk']
                    ,   'def' => $cardData['card_def']
                    );
                    $this->UserCard->save($values);

                    // コレクション登録
                    $this->UserCollect->initCollect($this->userId, $cardData['card_id']);
                } else {
                    // カード所持最大の場合はプレゼントボックスへ
                    $values[] = array(
                        $this->userId
                    ,   KIND_CARD
                    ,   $cardData['card_id']
                    ,   1
                    ,   $gachaData['gacha_name'] . 'ガチャで入手'
                    );
                    $this->UserPresentBox->registPBox($values);
                }

                // 有料ガチャの場合はおまけを受け取りボックスへ
                if ($gachaData['gacha_id'] == GACHA_SOZAI_ID) {
                    $itemId = 6;
                } else {
                    $itemId = 6;
                }
                $values = array();
                $values[] = array(
                    $this->userId
                ,   KIND_ITEM
                ,   $itemId 
                ,   1
                ,   $gachaData['gacha_name'] . 'のおまけ'
                );
                $this->UserPresentBox->registPBox($values);

                // ログ記述
                $values = array(
                    'id'       => $logList[0]['id'] 
                ,   'end_flg'  => 1
                );
                $this->UserGachaLog->save($values);


                // ログリスト
                $logList[] = $values;

            } catch (AppException $e) {
                $this->UserCard->rollback();
                $this->log($e->errmes);
                exit;
            }

        } else {

            // 10連ガチャ
            for ($i = 0; $i < 10; $i++) {

                $cardData = $this->Card->getCardData($logList[$i]['card_id']);

                if (empty($hasMaxFlg)) {
                    // カードリスト
                    $values[] = array(
                        $this->userId
                    ,   $cardData['card_id']
                    ,   $cardData['card_hp']
                    ,   $cardData['card_hp']
                    ,   $cardData['card_atk']
                    ,   $cardData['card_def']
                    );
                } else {

                    // プレゼントボックスリスト
                    $values[] = array(
                        $this->userId
                    ,   KIND_CARD
                    ,   $cardData['card_id']
                    ,   1
                    ,   $gachaData['gacha_name'] . 'ガチャで入手'
                    );
                }

            }

            try {

                // カード所持最大未満の場合はカードテーブルへ
                if (empty($hasMaxFlg)) {
                    $field = array('user_id', 'card_id', 'hp', 'hp_max', 'atk', 'def');
                    $this->UserCard->insertBulk($field, $values, $ignore = 1);
                } else {
                    // カード所持最大の場合はプレゼントボックスへ
                    $this->UserPresentBox->registPBox($values);
                }

                // 有料ガチャの場合はおまけを受け取りボックスへ
                $itemId = 6;

                $values = array();
                $values[] = array(
                    $this->userId
                ,   KIND_ITEM
                ,   $itemId 
                ,   10
                ,   $gachaData['gacha_name'] . 'のおまけ'
                );
                $this->UserPresentBox->registPBox($values);

                foreach ($logList as $val) {
                    $value = array(
                        'id'       => $val['id'] 
                    ,   'end_flg'  => 1
                    );
                    $this->UserGachaLog->save($value);

                    // コレクション登録
                    if (empty($hasMaxFlg)) {
                        $this->UserCollect->initCollect($val['user_id'], $val['card_id']);
                    }
                }

            } catch (AppException $e) {
                $this->UserCard->rollback();
                $this->log($e->errmes);
                header("HTTP/1.1 400 NG"); 
                echo "NG";
                exit;
            }
        }

        // endFlg
        $value = array(
            'id' => $latestData['id']
        ,   'end_flg' => 1
        );
        $this->PaymentLog->save($value);

        $this->UserCard->commit();

        header("HTTP/1.1 200 OK"); 
        echo "OK";
    }

    /**
     * ガチャ完了画面
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        // キャンセル
        if (!empty($this->params['paymentId'])) {
            $where = array(
                'payment_id' => $this->params['paymentId']
            ,   'end_flg' => 1     
            );
            $ret = $this->PaymentLog->field('id', $where);
            if (empty($ret)) {
                $this->rd('Gachas', 'index');
            }
        }

        $hasMaxFlg = isset($this->params['has_max_flg']) ? $this->params['has_max_flg'] : false;
        $log = $this->UserGachaLog->getGachaLogDataLatest($this->userId, $endFlg = 'no', $limit = 10);

        if (empty($log[0]['end_flg'])) {
            // データがない
            $this->log(__FILE__ . __LINE__ . ':No Data ProbList:userId;'. $this->userId);
            return $this->rd('Gachas', 'index', array('error'=> ERROR_ID_SYSTEM ));
        }

        $one = true;
        if (in_array($log[0]['gacha_id'], $this->gacha10)) $one = false;
        $list = array();
        foreach ($log as $val) {
            $data = $this->Card->getCardData($val['card_id']);
            $data['level'] = 1;
            $list[] = $data;
            if ($one) break;
        }
        $plus = 0;
        if (GACHA_MONEY_ID != $log[0]['gacha_id']) {
            $plus = 1;
        }
        $this->set('plus', $plus);
        $this->set('list', $list);
        $this->set('hasMaxFlg', $hasMaxFlg);
    }


}
