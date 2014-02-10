<?php
App::uses('ApiController', 'Controller');
/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    /**
     * ステージ一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = array('id');
        $where  = array();
        $this->Stage->getAllFind($where, $fields);
        $this->set('stages', $this->Paginator->paginate());

        $this->Stage->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->Stage->save($values);
            if (!$ret) {
                throw new AppException('Stage save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->Stage->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->Stage->commit();
	}

    /**
     * クエスト実行
     *
     * @author imanishi
     * @return void
     */
    public function main() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());

    }

    /**
     * ボス戦前
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
     * ボス戦
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
     * ボス戦後
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
     * クエスト完了
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * データ取得(更新不可)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this->Stage->getAllFind($this->request->query, $fields);
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

            if ($this->Stage->save($this->request->query)) {
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
