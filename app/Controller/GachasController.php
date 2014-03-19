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
	public $components = array('Paginator', 'Common');

    public $uses = array('Gacha', 'GachaProb', 'UserCard', 'Card', 'UserGachaLog');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $list = $this->Gacha->getList();
        $this->set('list', $list);

/*
        $this->Gacha->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->Gacha->save($values);
            if (!$ret) {
                throw new AppException('Gacha save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->Gacha->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->Gacha->commit();
 */
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
                'card_id' => $cardData['card_id']
            ,   'hp' => $cardData['card_hp']
            ,   'hp_max' => $cardData['card_hp']
            ,   'atk' => $cardData['card_atk']
            ,   'def' => $cardData['card_def']
            );
            $this->UserCard->save($values);

            // ログ記述
            $values = array(
                'user_id' => $this->userId 
            ,   'gacha_id' => $gachaId
            ,   'card_id'  => $cardData['card_id']
            );
            $this->UserGachaLog->save($values);

        } catch (Exception $e) {
            $this->UserCard->rollback();
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> 2));
        }
        $this->UserCard->commit();


        $params = array(
            'rare_level' => $cardData['rare_level']
        );

        $this->rd('Gacha', 'product', $params);
    }

    /**
     * ガチャ演出
     *
     * @author imanishi
     * @return void
     */
    public function product() {


    }

    /**
     * ガチャ完了
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
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
