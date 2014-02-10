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
     * チュートリアル振り分け
     *
     * @author imanishi 
     * @return json
     */
    private function _routeTutorial() {

        // チュートリアル終了判定
$this->log('action:'. $this->action);
        $where = array('user_id' => $this->userId);
        $fields = array('tutorial_id', 'end_flg');
        $row = $this->UserTutorial->getAllFind($fields, $where, 'first');
        if (!empty($row['UserTutorial']['end_flg'])) {
            return $this->rd('SnsUser', 'index');
        }
        if (!empty($row['UserTutorial']['tutorial_id'])) {
            return $this->rd('Tutorial', 'tutorial_'. $row['UserTutorial']['tutorial_id']);
        }
    }

    /**
     * オープニング演出
     *
     * @author imanishi 
     */
	public function index() {

        $fields = array('id');
        $where  = array('sns_user_id' => $this->ownerId);
        $userId = $this->User->field('id', $where);
$this->log($this->ownerId); 
$this->log($userId); 

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
     * チュートリアル2
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_2() { 
     
     } 

    /**
     * チュートリアル3
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_3() { 
     
     } 

    /**
     * チュートリアル4
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_4() { 
     
     } 

    /**
     * チュートリアル5
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_5() { 
     
     } 

    /**
     * チュートリアル6
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_6() { 
     
     } 

    /**
     * チュートリアル7
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_7() { 
     
     } 

    /**
     * チュートリアル8
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_8() { 
     
     } 

    /**
     * チュートリアル9
     *
     * @author imanishi 
     * @return void
     */
     public function futorial_9() { 
     
     } 

    /**
     * チュートリアル10
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_10() { 
     
     } 

    /**
     * チュートリアル11
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_11() { 
     
     } 

    /**
     * チュートリアル12
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_12() { 
     
     } 

    /**
     * チュートリアル13
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_13() { 
     
     } 

    /**
     * チュートリアル14
     *
     * @author imanishi 
     * @return void
     */
     public function tutorial_14() { 
     
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
