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

    public $uses = array('User', 'SnsUser','UserTutorial', 'Tutorial', 'Card', 'UserCard',
                    'UserDeck', 'UserDeckCard', 'Items', 'UserItem', 'UserPresentBox', 'UserTutorialQuestcnt');

    public $row  = array();

    public static $actionPref = 'tutorial_';

    // チュートリアル中進化をするカード
    public $tutoSampleCard = 31;

    /**
     * チュートリアル振り分け
     *
     * @author imanishi 
     * @return void
     */
    private function _routeTutorial() {

        // チュートリアル終了判定
        $where = array('user_id' => $this->userId);
        $fields = array('tutorial_id', 'end_flg');
        $row = $this->UserTutorial->getAllFind($where, $fields, 'first');
        if (!empty($row['end_flg'])) {
            return $this->rd('SnsUsers', 'index');
        }

        $current = str_replace(self::$actionPref, '', $this->action);

        // 不正遷移は戻す
        $where = array('tutorial_id' => $row['tutorial_id']); 
        $tutorial_next = $this->Tutorial->field('tutorial_next', $where);
        if ($current != $row['tutorial_id']) {
            if ($current != $tutorial_next) {
                return $this->rd('Tutorials', self::$actionPref . $row['tutorial_id'] );
            }
        }

        // データ格納
        $this->row = $this->Tutorial->getMstData($current);
    }

    /**
     * オープニング演出
     *
     * @author imanishi 
     */
	public function tutorial_1() {

        // 共通レイアウトは使わない
        $this->layout = '';

        // マスタデータ格納
        $current = str_replace(self::$actionPref, '', $this->action);
        $this->row = $this->Tutorial->getMstData($current);

        $userId = $this->userId;

        $this->User->begin();
        try {
            if (empty($userId)) {
                $name   = 'test';
                $carrer = 1;

                $values = array(
                    'sns_user_id'   => $this->ownerId
                ,   'viewer'        => $this->viewerId
                ,   'sns_name'      => $name
                );
                $ret = $this->SnsUser->save($values);
                if (!$ret) {
                    throw new AppException('SnsUser save failed :' . $this->name . '/' . $this->action);
                }

                $values = array(
                    'user_name'        => $name
                ,   'sns_user_id' => $this->ownerId
                ,   'carrer'      => $carrer
                );
                $ret = $this->User->save($values);
                if (!$ret) {
                    throw new AppException('User save failed :' . $this->name . '/' . $this->action);
                }
                $userId = $ret['User']['user_id'];
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
	}

   /**
    * チュートリアル2
    *
    * @author imanishi 
    * @return void
    */
    public function tutorial_2() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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


        // アサイン
        $this->set('row', $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル3
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_3() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

    
        // アサイン
        $this->set('row', $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル4
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_4() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
            }

            /********************************************** 
            * 初期カードとデッキの登録
            ***********************************************/ 
            // カードデータ取得
            $list = $this->Card->getStartCardList();
            if (empty($list)) {
                throw new AppException('getStartCardData faild :' . $this->name . '/' . $this->action);
            }

            // 初回カード振込確認
            $where = array(
                'UserCard.user_id' => $this->userId
            ,   'UserCard.card_id' => $list[0]['card_id'] 
            ); 
            $userCard = $this->UserCard->field('user_card_id', $where);
            // 未振込であれば振込処理
            if (!$userCard) {

                // カード登録
                $ret = $this->UserCard->registStartCard($this->userId, $list);
                if (!$ret) {
                    throw new AppException('UserCard save failed :' . $this->name . '/' . $this->action);
                }

                // デッキ登録
                $values = array(
                    'user_id' => $this->userId 
                ,   'kind' => 1
                );
                $ret = $this->UserDeck->save($values);
                if (empty($ret['UserDeck']['user_id'])) {
                    throw new AppException('UserDeck save failed :' . $this->name . '/' . $this->action);
                }

                $list = $this->UserCard->getUserCard ($this->userId);
                if (empty($list[0]['user_card_id'])) {
                    throw new AppException('UserCardId get failed :' . $this->name . '/' . $this->action);
                }

                // デッキとユーザ所有カードを紐づけ
                $ret = $this->UserDeckCard->regist($ret['UserDeck']['user_deck_id'], $list);
                if (!$ret) {
                    throw new AppException('UserDeckCard save failed :' . $this->name . '/' . $this->action);
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

     
        // アサイン
        $this->set('row', $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);

        $data = array('progress' => 0, 'act' => 100, 'exp' => 0);
        $this->set('act', $data['act']);
        $this->set('prog', $data['progress']);
        $this->set('exp', $data['exp']);
        $param = json_encode($data);
        $this->set('param', $param);
    } 

    /**
     * チュートリアル5
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_5() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // カードデータ
        $data = $this->Card->getCardData($this->tutoSampleCard);
     
        // アサイン
        $this->set('row', $this->row);
        $this->set('data', $data);
        $this->set('guideId', 2 );
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル6
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_6() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // カードデータ
        $data = $this->UserCard->getUserCardLatest ($this->tutoSampleCard, $this->userId);

        // アサイン
        $this->set('row',  $this->row);
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('data', $data );
        $this->set('guideId', 1 );
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル7
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_7() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

     
        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル8
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_8() { 

        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

     
        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル9
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_9() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル10
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_10() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル11
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_11() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル12
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_12() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル13
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_13() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル14
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_14() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル15
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_15() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル16
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_16() { 
     
        $this->_routeTutorial();

        $current = str_replace(self::$actionPref, '', $this->action);

        $this->User->begin();
        try {
            $values = array(
                'user_id'     => $this->userId
            ,   'tutorial_id' => $current
            ,   'end_flg'     => 1
            );
            $ret = $this->UserTutorial->save($values);
            if (!$ret) {
                throw new AppException('UserTutorial save failed :' . $this->name . '/' . $this->action);
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル最終処理
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_99() { 
     

        $this->rd('SnsUsers', 'index');
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
     * クエスト演出
     *
     * @author imanishi 
     * @return json 
     */
	public function quest() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $params = $this->params;
            $data = (array)json_decode($params['params']);

            $where = array('user_id' => $this->userId);
            $field = array('cnt');
            $row = $this->UserTutorialQuestcnt->getAllFind($where, $field, 'first');
            if (empty($row)) $row['cnt'] = 0;
            $cnt = ++$row['cnt'];


            $this->User->begin();
            try {
                $values = array(
                    'user_id'     => $this->userId
                ,   'cnt'         => $cnt
                );
                $this->UserTutorialQuestcnt->save($values);

            } catch (AppException $e) {

                $this->User->rollback();

                $this->log($e->errmes);
                return $this->redirect(
                           array('controller' => 'errors', 'action' => 'index'
                                 , '?' => array('error' => 2)
                       ));
            }
            $this->User->commit();

            $data['act'] = 100 - $cnt;
            $data['progress'] = $cnt;
            $data['exp'] = $cnt;
            $data['result'] = 1;
            $data['action'] = 'Tutorials_quest';

            if (3 < $cnt) {
            
                $data['kind'] = '1';
                $data['name'] = '結依';
                $data['target'] = 31;
            }

            if (4 < $cnt) {
                $data['tuto_next'] = '1';
            }

        } else {
            $data = array('result' => 2);
        }
        $params = json_encode($data);
        echo $params;
        // $this->setJson($data);
	}


}
