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
    
	public $uses = array('SnsUser', 'Info');

    /**
     * トップページ
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        $where = array(
            'sns_user_id' => $this->ownerId
        ,   'viewer' => $this->viewerId
        );
        $fields = array('sns_user_id');
        $list = $this->SnsUser->getAllFind($where, $fields);
        if (empty($list)) {
            return $this->redirect(array('controller' => 'tutorials', 'action' => 'index'));
        }

        $limit = 3;
        $list = $this->Info->getList($limit);

        $this->set('list',  $list);
        $this->set('subTitle',  'お知らせ');
	}
}
