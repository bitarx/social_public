<?php
App::uses('ApiController', 'Controller');
/**
 * SnsUsers Controller
 *
 * @property SnsUser $SnsUser
 * @property PaginatorComponent $Paginator
 */
class SnsUsersController extends ApiController {

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

        $ownerId  = isset($this->request->query['opensocial_owner_id']) ? $this->request->query['opensocial_owner_id'] : '';
        $viewerId = isset($this->request->query['opensocial_viewer_id']) ? $this->request->query['opensocial_viewer_id'] : '';
        if ( !empty($ownerId) && !empty($viewerId) ) {

            $this->Cookie->write('owner_id', $ownerId);
            $this->Cookie->write('viewer_id', $viewerId);
        }

        $where = array(
            'id' => $ownerId
        ,   'viewer' => $viewerId
        );
        $fields = array('id');
        $list = $this->SnsUser->getAllFind($fields, $where);
        if (empty($list)) {
            return $this->redirect(array('controller' => 'tutorials', 'action' => 'index'));
        }
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
            $list = $this->SnsUser->getAllFind($this->request->query, $fields);
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

            if ($this->SnsUser->save($this->request->query)) {
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
