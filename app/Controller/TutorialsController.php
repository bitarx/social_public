<?php
App::uses('ApiController', 'Controller');
/**
 * Tutorials Controller
 *
 * @property Tutorial $Tutorial
 * @property PaginatorComponent $Paginator
 */
class TutorialsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('User', 'UserTutorial');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = array('id');
        $where  = array('sns_user_id' => $this->ownerId);
        $userId = $this->User->field('id', $where);

        $this->User->begin();
        try {
            if (empty($userId)) {
                $name   = 'test';
                $carrer = 1;
                $values = array(
                    'name'        => $name
                ,   'sns_user_id' => $this->ownerId
                ,   'carrer'      => $carrer
                );
                $ret = $this->User->save($values);
                if (!$ret) {
                    throw new AppException('User save failed :' . $this->name . '/' . $this->action);
                }
                $userId = $ret['User']['id'];
            }

            $where = array(
                'user_id' => $userId
            );
            $utid = $this->UserTutorial->field('user_id', $where);
            if (empty($utid)) {
                $tutorialId = 1;
                $values = array(
                    'user_id'     => $userId
                ,   'tutorial_id' => $tutorialId
                );
                $ret = $this->UserTutorial->save($values);
                if (!$ret) {
                    throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
                }
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
            $list = $this->Tutorial->getAllFind($this->request->query, $fields);
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

            if ($this->Tutorial->save($this->request->query)) {
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
