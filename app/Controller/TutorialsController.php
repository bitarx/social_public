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

    public $uses = array('User', 'SnsUser','UserTutorial', 'Tutorial', 'Card', 'UserCard'
                        , 'UserParam','UserDeck', 'UserDeckCard', 'Items', 'UserItem'
                        , 'UserPresentBox', 'UserTutorialQuestcnt', 'UserBaseCard');

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

        if ($this->tutoEnd == 1) {
            if (!empty($_COOKIE['opensocial_owner_id']) && !empty($_COOKIE['opensocial_viewer_id'])) {
                $this->rd('SnsUsers', 'index');
            }
        } else {

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

                    // パラメータ登録
                    $values = array(
                        'user_id'        => $userId
                    ,   'act'            => $this->_startAct
                    ,   'act_max'        => $this->_startActMac
                    ,   'cost_atk'       => $this->_costAtk
                    ,   'cost_def'       => $this->_costDef
                    ,   'level'          => $this->_level
                    );
                    $ret = $this->UserParam->save($values);
                    if (!$ret) {
                        throw new AppException('UserParam save failed :' . $this->name . '/' . $this->action);
                    }
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
        $this->set('guideId', 1 );
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
        $this->set('guideId', 1 );
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

                $sortItem = 1; // user_card_idの古い順
                $list = $this->UserCard->getUserCard ($this->userId,$cardId=0, $userCardId=0, $limit = 5, $offset=0, $rareLevel = 0,$sortItem);
                if (empty($list[0]['user_card_id'])) {
                    throw new AppException('UserCardId get failed :' . $this->name . '/' . $this->action);
                }

                // デッキとユーザ所有カードを紐づけ
                $ret = $this->UserDeckCard->regist($ret['UserDeck']['user_deck_id'], $list);
                if (!$ret) {
                    throw new AppException('UserDeckCard save failed :' . $this->name . '/' . $this->action);
                }

                // ベースカード登録
                $values = array(
                    'user_id' => $this->userId
                ,   'user_card_id' => $list[0]['user_card_id']
                );
                $this->UserBaseCard->save($values);
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

     
                $list = $this->UserCard->getUserCard ($this->userId);

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

     
        // アサイン
        $this->set('row', $this->row);
        $this->set('guideId', 2 );
        $this->set('tutoSampleCard', $this->tutoSampleCard );
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

        // アサイン
        $this->set('row',  $this->row);
        $this->set('title',  $this->row['tutorial_title']);
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

        // 共通レイアウトは使わない
        $this->layout = '';

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


        // ベースカード
        $baseCard = IMG_URL . 'tutorial/card_l_31.jpg';

        // 素材カード
        $target = IMG_URL . 'tutorial/card_l_31.jpg';

        // 合成後カード
        $afterCard = IMG_URL . 'tutorial/card_l_32.jpg';


        // アサイン
        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);
     
        $this->set('row',  $this->row);
        $this->set('guideId',  1 );
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
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId', 1 );
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
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId',  1);
        $this->set('tutoSampleCard', $this->tutoSampleCard );
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル10
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_10() { 

        // 共通レイアウトは使わない
        $this->layout = '';
     
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

        // 演出で使用する素材
        $baseCard = IMG_URL . 'tutorial/card_l_13.jpg';
        $sacrificeList[] = IMG_URL . 'tutorial/card_l_31.jpg';
        $sacrificeList = json_encode($sacrificeList);
        $startExp = 0;
        $endExp = 120;

        // アサイン
        $this->set('row',  $this->row);

        $this->set('baseCard', $baseCard);
        $this->set('sacrificeList', $sacrificeList);
        $this->set('startExp', $startExp);
        $this->set('endExp', $endExp);
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
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId',  1 );
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

        $data['before_words'] = $this->row['tutorial_words'];

        // アサイン
        $this->set('row',  $this->row);
        $this->set('data',  $data);
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId',  2 );
        $this->set('next', self::$actionPref . $this->row['tutorial_next']);
    } 

    /**
     * チュートリアル13
     *
     * @author imanishi 
     * @return void
     */
    public function tutorial_13() { 

        // 共通レイアウトは使わない
        $this->layout = '';
     
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

        // 基礎値
        $data = array(
                    'card_id_1_max' => 1000
                ,   'card_id_1_cur' => 1000
                ,   'card_id_2_max' => 900
                ,   'card_id_2_cur' => 900
                ,   'card_id_3_max' => 800
                ,   'card_id_3_cur' => 800
                ,   'card_id_4_max' => 700
                ,   'card_id_4_cur' => 700
                ,   'card_id_5_max' => 600
                ,   'card_id_5_cur' => 600
                ,   'enemy_max'     => 1000
                ,   'enemy_cur'     => 1000
                );

        // ターン
        $log = array(
                   0 => array(
                            0 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 903
                                                     )
                                 ,   'damage' => 97                    
                                 )
                        ,   1 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 801 
                                                     )
                                 ,   'damage' => 102                    
                                 )
                        ,   2 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 716
                                                     )
                                 ,   'damage' => 85                   
                                 )
                        ,   3 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 625
                                                     )
                                 ,   'damage' => 91                   
                                 )
                        ,   4 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 534
                                                     )
                                 ,   'damage' => 91                   
                                 )
                        ),
                   1 => array(
                            0 => array(
                                     'targetData' => array(
                                                        'hp'       => 100
                                                     )
                                 ,   'damage' => 17                    
                                 )
                        ,   1 => array(
                                     'targetData' => array(
                                                        'hp'       => 100
                                                     )
                                 ,   'damage' => 12                    
                                 )
                        ,   2 => array(
                                     'targetData' => array(
                                                        'hp'       => 100
                                                     )
                                 ,   'damage' => 15                   
                                 )
                        ,   3 => array(
                                     'targetData' => array(
                                                        'hp'       => 100
                                                     )
                                 ,   'damage' => 20                  
                                 )
                        ,   4 => array(
                                     'targetData' => array(
                                                        'hp'       => 100
                                                     )
                                 ,   'damage' => 13                  
                                 )
                        ),
                   2 => array(
                            0 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 406
                                                     )
                                 ,   'damage' => 128                   
                                 )
                        ,   1 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 304
                                                     )
                                 ,   'damage' => 102                    
                                 )
                        ,   2 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 104
                                                     )
                                 ,   'damage' => 200                  
                                 )
                        ,   3 => array(
                                     'targetData' => array(
                                                         'enemy_id' => 0
                                                     ,   'hp'       => 0
                                                     )
                                 ,   'damage' => 104                  
                                 )
                        )
               );

        // 演出用ターン配列生成
        $turn = array();
        $i = 0;
        foreach ($log as $key => $value) {
            if (is_numeric($key)) {
                $hp = array();
                foreach ($value as $val) {
                    $hp[] = $val['targetData']['hp'];
                }

                if ( isset($val['targetData']['enemy_id']) ) {
                    // プレイヤーの攻撃
                    $turn[$i]['enemyHP'] = $hp;
                } else {
                    // 敵の攻撃
                    $turn[$i]['playerHP'] = $hp;
                    $i++;
                }
            }
        }

        $turn = json_encode($turn);

        // アサイン
        $this->set('data', $data);
        $this->set('enemy', 0 );
        $this->set('turn', $turn);

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

        // 共通レイアウトは使わない
        $this->layout = '';
     
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
   $this->log($this->row); 
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

            /********************************************** 
            * 初期カードとデッキの登録
            ***********************************************/ 
            // カードデータ取得
            $list = $this->Card->getStartSpecialCardList();

            // 初回カード振込確認
            $where = array(
                'UserCard.user_id' => $this->userId
            ,   'UserCard.card_id' => $list[0]['card_id'] 
            ); 
            $userCard = $this->UserCard->field('user_card_id', $where);

            // 未振込であれば振込処理
            if (!$userCard) {

                // カード登録
                $this->UserCard->registStartCard($this->userId, $list);
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
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId',  2 );
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
        $this->set('title',  $this->row['tutorial_title']);
        $this->set('guideId',  1 );
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

            // キャラのセリフ抽選
            $deckList = $this->UserDeck->getUserDeckData($this->userId);
            $list = $deckList['UserDeckCard'];
            shuffle($list);

            $row = $list[0];

            $cardData = $this->Card->getCardData($row['UserCard']['card_id']);
            $data['name'] = $cardData['card_mes'];
            $data['target']  = $row['UserCard']['card_id'];


            $data['act'] = 100 - $cnt;
            $data['progress'] = $cnt;
            $data['exp'] = $cnt;
            $data['result'] = 1;
            $data['tuto'] = 1;
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
