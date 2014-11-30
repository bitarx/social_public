<?php
App::uses('ApiController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('UserCard', 'UserParam', 'UserDeckCard', 'SnsUser');

    /**
     * マイページ
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        // デッキリスト
        $userDeckList = $this->UserDeckCard->getUserDeckData($this->userId);

        // ユーザ名
        $snsUserName  = $this->SnsUser->getUserName($this->ownerId);

        // カード所持枚数
        $this->userParam['card_cnt'] = $this->UserCard->getUserCardCnt($this->userId );

        $act = ($this->userParam['act'] / $this->userParam['act_max']) * 100;

        // アサイン
        $this->set('list', $userDeckList);
        $this->set('data', $this->userParam);
        $this->set('act' , $act);
        $this->set('name', $snsUserName);
        $this->set('haveMoney', $this->userParam['money']);
	}
}
