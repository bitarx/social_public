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
  $this->log($userDeckList); 

        // アサイン
        $this->set('list', $userDeckList);
        $this->set('data', $this->userParam);
        $this->set('name', $snsUserName);
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
            $list = $this->User->getAllFind($this->request->query, $fields);
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
