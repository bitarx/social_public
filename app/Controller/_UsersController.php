<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    /**
     * 返却はJson形式
     *
     * @author imanishi
     * @return void
     */
    public function beforeFilter() {
        $this->viewClass = 'Json';
    }

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = func_get_args();
        $list = $this->User->getAllFind($this->request->query, $fields);
        $this->setJson($list);
	}

    /**
     * 条件検索
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        $fields = func_get_args();
        $list = $this->User->getAllFind($this->request->query, $fields);
        $this->setJson($list);
    }

    /**
     * 登録更新
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:post以外のリクエスト
     */
	public function init() {

		if ($this->request->is(array('put'))) {
			if ($this->User->save($this->request->query)) {
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
