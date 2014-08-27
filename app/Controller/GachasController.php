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
	public $components = array('Paginator', 'Common', 'Gacha');

    public $uses = array('Gacha', 'GachaProb', 'UserCard', 'Card', 'UserGachaLog');

    // 10連ガチャID
    public $gacha10 = array( 2 );

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $list = $this->Gacha->getList();
        $this->set('list', $list);
	}

    /**
     * 決済画面へ遷移前
     *
     * @author imanishi 
     * @return json
     */
	public function api() {

        // 不正
        if ( empty($this->params['gacha_id']) ) {
            $this->rd('errors', 'index', array('error' => 2));
        }
        $gachaId = $this->params['gacha_id'];


        // 仮に飛ばす
        $param = array('gacha_id' => $gachaId);
        $this->rd('gachas', 'act', $param);
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
            return $this->rd('Gacha', 'index', array('error'=> 1));
        }

        $probList = $this->GachaProb->getGachaProbList ($gachaId);

        $data = $this->Common->doLot($probList);

        $cardData = $this->Card->getCardData($data['card_id']);

        $this->UserCard->begin();
        try {
            $values = array(
                'user_id' => $this->userId
            ,   'card_id' => $cardData['card_id']
            ,   'hp' => $cardData['card_hp']
            ,   'hp_max' => $cardData['card_hp']
            ,   'atk' => $cardData['card_atk']
            ,   'def' => $cardData['card_def']
            );
$this->log($values); 
            $this->UserCard->save($values);

            // ログ記述
            $values = array(
                'user_id' => $this->userId 
            ,   'gacha_id' => $gachaId
            ,   'card_id'  => $cardData['card_id']
            );
$this->log($values); 
            $this->UserGachaLog->save($values);

        } catch (AppException $e) {
            $this->UserCard->rollback();
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> 2));
        }
        $this->UserCard->commit();


        $params = array(
            'rare_level' => $cardData['rare_level']
        );

        if (in_array($gachaId, $this->gacha10)) {
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
        $product = $this->Gacha->doProductLot($rareLevel);
        if (empty($rareLevel)) {
            $this->rd('UserCards', 'index', array('error' => 2));
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
        $product = $this->Gacha->doProductLot($rareLevel);
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
$this->log('procuct10'); 

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
     * ガチャ完了
     *
     * @author imanishi
     * @return void
     */
    public function comp() {
/*
        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
*/
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
