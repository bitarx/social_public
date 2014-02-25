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

    public $uses = array('UserCard', 'UserParam', 'BattleLog');

    /**
     * マイページ
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        // カーソリスト
        $userCardList = $this->UserCard->getUserCard ($this->userId);

        // ステータス
        $userParamData = $this->UserParam->getUserParams ($this->userId);

        // バトルログ
        $battleLogList = $this->BattleLog->getBattleLogList ($this->userId);


        // アサイン
        $this->set('userCardList', $userCardList);
        $this->set('userParamData', $userParamData);
        $this->set('battleLogList', $battleLogList);
/*
        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->User->save($values);
            if (!$ret) {
                throw new AppException('User save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->User->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->User->commit();
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
