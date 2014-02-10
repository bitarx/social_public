<?php
App::uses('ApiController', 'Controller');
/**
 * UserDeckCards Controller
 *
 * @property UserDeckCard $UserDeckCard
 * @property PaginatorComponent $Paginator
 */
class UserDeckCardsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = array('id');
        $where  = array();
        $this->UserDeckCard->getAllFind($where, $fields);
        $this->set('userDeckCards', $this->Paginator->paginate());

        $this->UserDeckCard->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->UserDeckCard->save($values);
            if (!$ret) {
                throw new AppException('UserDeckCard save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->UserDeckCard->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->UserDeckCard->commit();
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
            $list = $this->UserDeckCard->getAllFind($this->request->query, $fields);
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

            if ($this->UserDeckCard->save($this->request->query)) {
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
