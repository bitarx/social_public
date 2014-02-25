<?php
App::uses('ApiController', 'Controller');
/**
 * Quests Controller
 *
 * @property Quest $Quest
 * @property PaginatorComponent $Paginator
 */
class QuestsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('UserStage');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {
        
        // 到達したステージリスト
        $userStageList = $this->UserStage->getUserStage($this->userId, $stageId = 0, $recu = 2);
        $this->set('userStageList', $userStageList);
/*
        $this->Quest->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->Quest->save($values);
            if (!$ret) {
                throw new AppException('Quest save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->Quest->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->Quest->commit();
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
            $list = $this->Quest->getAllFind($this->request->query, $fields);
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

            if ($this->Quest->save($this->request->query)) {
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
