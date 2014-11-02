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

    public $uses = array('Gacha', 'GachaProb', 'UserCard', 'Card', 'UserGachaLog', 'PaymentLog', 'UserItem');

    // 10連ガチャID
    public $gacha10 = array( GACHA_10_ID );

    // 無課金ガチャID
    public $gachaMoney = array( GACHA_MONEY_ID );

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $tNum = $this->UserItem->hasPremiumGachaTiket($this->userId);

        $list = $this->Gacha->getList();
        $this->set('list', $list);
        $this->set('tNum', $tNum);
        $this->set('haveMoney', $this->userParam['money']);
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
            return $this->rd('Errors', 'index', array('error'=> 1));
        }

        $where = array('gacha_id' => $gachaId );
        $gachaData = $this->Gacha->getAllFind($where, array(), 'first');

        $probList = $this->GachaProb->getGachaProbList ($gachaId);
        if (empty($probList)) {
            // データがない
            $this->log(__FILE__ . __LINE__ . ':No Data ProbList:userId;'. $this->userId);
            return $this->rd('Gachas', 'index', array('error'=> 1));
        }

        $gacha10 = false;

        if (in_array($gachaId, $this->gacha10)) $gacha10 = true;
        

        $this->UserCard->begin();

        if (!$gacha10) {
            // 単品ガチャ

            // 無料ガチャの場合はゴールドチェック
            if (in_array($gachaId, $this->gachaMoney)) {
               if ($this->userParam['money'] < $gachaData['point']) {
                   $param = array('money' => 1);
                   $this->rd('Gachas', 'index', $param);
               }
            }

            $data = $this->Common->doLot($probList);

            $cardData = $this->Card->getCardData($data['card_id']);

            try {
                $values = array(
                    'user_id' => $this->userId
                ,   'card_id' => $cardData['card_id']
                ,   'hp' => $cardData['card_hp']
                ,   'hp_max' => $cardData['card_hp']
                ,   'atk' => $cardData['card_atk']
                ,   'def' => $cardData['card_def']
                );
                $this->UserCard->save($values);

                // 無料ガチャの場合はゴールド減算
                if (in_array($gachaId, $this->gachaMoney)) {
                    $money = $this->userParam['money'] - $gachaData['point'];
                    $values = array(
                        'user_id' => $this->userId
                    ,   'money'   => $money 
                    );
                    $this->UserParam->save($values);
                }

                // ログ記述
                $values = array(
                    'user_id' => $this->userId 
                ,   'gacha_id' => $gachaId
                ,   'card_id'  => $cardData['card_id']
                );
                $this->UserGachaLog->save($values);

                // ログリスト
                $logList[] = $values;

            } catch (AppException $e) {
                $this->UserCard->rollback();
                $this->log($e->errmes);
                return $this->rd('Errors', 'index', array('error'=> 2));
            }

            $rareLevel = $cardData['rare_level'];
        } else {

            // 10連ガチャ
            $cardList = array();
            $logList  = array();
            $rareLevel = 1;

            for ($i = 1; $i <= 10; $i++) {
                $data = $this->Common->doLot($probList);

                $cardData = $this->Card->getCardData($data['card_id']);

                // カードリスト
                $cardList[] = array(
                    $this->userId
                ,   $cardData['card_id']
                ,   $cardData['card_hp']
                ,   $cardData['card_hp']
                ,   $cardData['card_atk']
                ,   $cardData['card_def']
                );

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

            try {

                $field = array('user_id', 'card_id', 'hp', 'hp_max', 'atk', 'def');
                $this->UserCard->insertBulk($field, $cardList, $ignore = 1);

                $field = array('user_id', 'gacha_id', 'card_id');
                $this->UserGachaLog->insertBulk($field, $logList, $ignore = 1);

            } catch (AppException $e) {
                $this->UserCard->rollback();
                $this->log($e->errmes);
                return $this->rd('Errors', 'index', array('error'=> 2));
            }

        }
        $this->UserCard->commit();

        // 無課金ガチャ
        if (in_array($gachaId, $this->gachaMoney)) {
            $param = array('rare_level' => $rareLevel );
            $this->rd('gachas', 'product', $param);
        }

        // プレミアムガチャチケット判定
        $tNum = 0;
        if ($gachaId == GACHA_PREMIUM_ID) {
            $tNum = $this->UserItem->hasPremiumGachaTiket($this->userId);
        }

        // チケット保有がなければ
        if ( empty($tNum) ) {

            /********************************************** 
             * 以下課金API
            ***********************************************/ 
            // アプリヒルズ側で購入が確定した際の通知先URL
            $callbackUrl = BASE_URL . "Gachas/comp";

            // アプリヒルズ側で購入が完了した後の戻り先URL
            if ($gacha10) {
                // １０連ガチャ
                $finishPageUrl = BASE_URL . "Gachas/product10?rare_level=". $rareLevel;
            } else {
                // 単品ガチャ
                $finishPageUrl = BASE_URL . "Gachas/product?rare_level=". $rareLevel;
            }


            // 購入アイテムの配列（複数のアイテム指定可）
            // アイテム名や説明文はUTF-8
            $items = array();
            $items[] = array(
              "itemId"      => $gachaData['gacha_id'],
              "name"        => $gachaData['gacha_name'],
              "unitPrice"   => $gachaData['point'],
              "quantity"    => 1,
              "imageUrl"    => IMG_URL . 'gacha/icon_' . $gachaData['gacha_id'] . '.png',
              "description" => $gachaData['gacha_detail'],
            );

            $this->snsUtil = ApplihillsUtil::create();
            $payment = $this->snsUtil->createPayment($callbackUrl, $finishPageUrl, $items);

            if ($payment) {
                // 決済ID（Paymentオブジェクトごとに割り当てられます）
                $paymentId = $payment["paymentId"];

                $itemLog = json_encode($items);

                // 購入情報（Payment IDとアイテム情報を結びつけたもの）をデータベース等に保存
                $this->PaymentLog->begin();
                try {
                    $values = array(
                                  'payment_id' => $paymentId
                              ,   'user_id'   => $this->userId
                              ,   'log'       => json_encode($logList)
                              );
                    $this->PaymentLog->save($values);

                    
                } catch (AppException $e) { 
                    $this->UserParam->rollback(); 
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> 2)); 
                } 
                $this->PaymentLog->commit();

                // アイテム購入ページへリダイレクト
                header("Location: " . $payment["transactionUrl"], true, 302);
                exit;
            } else {
                // 失敗した時の処理
                $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
                $this->rd('Errors', 'index', array('error' => 2));
            }
        } else {

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
                $this->rd('Errors', 'index', array('error'=> 2));
            }
            $this->UserItem->commit();

        }


        $params = array(
            'rare_level' => $rareLevel
        );

        if ($gacha10) {
            // １０連ガチャ
            $this->rd('Gachas', 'product10', $params);
        } else {
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

        // パラメータ取得
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        $product = $this->GachaFunc->doProductLot($rareLevel);
        if (empty($rareLevel)) {
            $this->rd('Errors', 'index', array('error' => 1));
        }


        // ベースカード
        $baseCard = IMG_URL . 'gacha/card.png';

        // 素材カード
        $target = IMG_URL . 'gacha/card.png';

        // 最終カード
        $afterCard = IMG_URL . 'gacha/card.png';



        $this->set('product', $product);
        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);

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

        // パラメータ取得
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        $product = $this->GachaFunc->doProductLot($rareLevel);
        if (empty($rareLevel)) {
            $this->rd('UserCards', 'index', array('error' => 2));
        }

        // ベースカード
        $baseCard = IMG_URL . 'gacha/card.png';

        // 素材カード
        $target = IMG_URL . 'gacha/card.png';

        // 合成後カード
        $afterCard = IMG_URL . 'gacha/card_s.png';

        $this->set('product', $product);
        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);

    }

    /**
     * ガチャ演出１０連
     *
     * @author imanishi
     * @return void
     */
    public function _product10() {

        // 共通レイアウトは使わない
        $this->layout = '';

        // パラメータ取得
        $baseCard = isset($this->params['base_card']) ? $this->params['base_card'] : 0;
        $upExp = isset($this->params['up_exp']) ? $this->params['up_exp'] : 0;
        $startExp = isset($this->params['start_exp']) ? $this->params['start_exp'] : 0;

        $list = array();
        for ($i = 1; $i <= 10; $i++) {
            $list[] = IMG_URL . 'gacha/card.png';
        }

        if (empty($baseCard) || empty($list) || empty($upExp)) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
//            $this->rd('UserCards', 'index', array('error' => 1));
        }


        $sacrificeList = json_encode($list);
        $baseCard = FILEOUT_URL . '?size=m&dir=card&target=' . $baseCard;
        $endExp = $upExp + $startExp;

// 仮
$baseCard = IMG_URL . 'miku_v02.jpg';

        $this->set('baseCard', $baseCard);
        $this->set('sacrificeList', $sacrificeList);
        $this->set('startExp', $startExp);
        $this->set('endExp', $endExp);
    }

    /**
     * ガチャ完了処理
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $this->autoRender = false;   // 自動描画をさせない

    }

    /**
     * ガチャ完了画面
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        $log = $this->UserGachaLog->getGachaLogDataLatest($this->userId, $limit = 10);

        $one = true;
        if (in_array($log[0]['gacha_id'], $this->gacha10)) $one = false;
        $list = array();
        foreach ($log as $val) {
            $list[] = $this->UserCard->getUserCardLatest($val['card_id'], $this->userId);
            if ($one) break;
        }
        $this->set('list', $list);
    }

    /**
     * 条件検索(変更禁止)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this->Gacha->getAllFind($this->request->query, $fields);
            $this->setJson($list);
        }
    }

    /**
     * 登録更新(変更禁止)
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function init() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            if ($this->Gacha->save($this->request->query)) {
                $ary = array('result' => 1);
            } else {
                $ary = array('result' => 0);
            }
        } else {
            $ary = array('result' => 2);
        }

        $this->setJson($ary);
	}


}
