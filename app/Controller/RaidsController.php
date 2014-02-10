<?php
App::uses('ApiController', 'Controller');
/**
 * Raids Controller
 *
 * @property Raid $Raid
 * @property PaginatorComponent $Paginator
 */
class RaidsController extends ApiController {

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
        $this->Raid->getAllFind($where, $fields);
        $this->set('raids', $this->Paginator->paginate());

        $this->Raid->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->Raid->save($values);
            if (!$ret) {
                throw new AppException('Raid save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->Raid->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->Raid->commit();
	}

    /**
     * レイドボス戦前
     *
     * @author imanishi
     * @return void
     */
    public function conf() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * レイドボス戦演出
     *
     * @author imanishi
     * @return void
     */
    public function product() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * レイドボス戦後
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
            $list = $this->Raid->getAllFind($this->request->query, $fields);
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

            if ($this->Raid->save($this->request->query)) {
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
