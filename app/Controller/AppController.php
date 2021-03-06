<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * メンテナンス
     */
    public static $menteNo = 1;      // 1:通常メンテ 2:メンテ時刻遅延
    public static $mentePlatform = 'niji';      // allにすると全環境メンテ
    public static $menteEnd = '11:00';

    // メンテナンス中でも入れるユーザーのowner_id
//    public static $testUserHills = array(553544, 553984, 566162);
    public static $testUserHills = array();

    public static $testUserWaku = array(6578349);
//    public static $testUserWaku = array();

    public static $testUserNiji = array(193408, 684606);
//    public static $testUserNiji = array();


    /**
     * 定数
     *
     * @var array
     */
    public $gameTitle = SITE_TITLE;
    
    public $ownerInfo = "";

    // 確率変動アイテム文言
    public $effectStr = array(
                            3 =>  'カード出現率アップ'
                        ,   4 =>  'ペニー出現率アップ'
                        );


    public $viewClass = 'Smarty';

    public $uses = array('SnsUser', 'User', 'UserTutorial', 'UserParam', 'EvQuest', 'UserQueryString', 'EvRaid', 'UserStage');

    public $components = array('Cookie', 'Common');

    public $ownerId  = "";
    public $viewerId = "";
    public $userId   = 0;
    public $params   = array();
    public $userParam  = array();
    public $tutoEnd  = 0;

    public $event     = array();
    public $raidEvent = array();

    public static $ctlRegist = array('Tutorials');

    public static $ctlError = array('CakeError', 'Errors');

    // キャリア
    public $carrer = 0;

    // SNSApi関連クラス
    public $snsUtil = array();

    // ページング
    public $page = 1;
    public $offset = 0;

    // ソート項目
    public $rareLevel = array(
                            0 => '全て'
                        ,   1 => 'N以下'
                        ,   2 => 'HN以下'
                        ,   3 => 'R以下'
                        ,   4 => 'HR以下'
                        ,   5 => 'SR以下'
                        );

    public $sortItem = array(
                            0 => '追加された順'
                        ,   1 => '古い順'
                        ,   2 => 'レアリティ高い順'
                        ,   3 => 'レアリティ低い順'
                        ,   4 => 'Lv高い順'
                        ,   5 => 'Lv低い順'
                        ,   6 => '攻撃力高い順'
                        ,   7 => '攻撃力低い順'
                        ,   8 => '防御力高い順'
                        ,   9 => '防御力低い順'
                        );

    protected $_startAct    = 100;   // 初期行動力
    protected $_startActMac = 100;   // 初期行動力最大値
    protected $_costAtk     = 10;    // 初期攻撃デッキコスト
    protected $_costDef     = 10;    // 初期防御デッキコスト
    protected $_level       = 1;     // 初期レベル

    public function beforeFilter() { 

        $this->params =  $this->request->query;

        $this->carrer = $this->Common->judgeCarrer();

        // Js内で画面横幅変更用
        $divNum = 1;
        if (CARRER_IPHONE == $this->carrer) $divNum = 2;
        $this->set('divNum', $divNum); 

        // キャリア
        $this->set('carrer', $this->carrer); 


        // 正常な初回アクセスはリクエストにIDが含まれる
        $ownerId  = isset($this->params['opensocial_owner_id']) ? $this->params['opensocial_owner_id'] : '';
        $viewerId = isset($this->params['opensocial_viewer_id']) ? $this->params['opensocial_viewer_id'] : '';

        // SNSクラス生成
        if ( 'hills' == PLATFORM_ENV ) {
            $this->snsUtil = ApplihillsUtil::create();
        } elseif ( 'waku' == PLATFORM_ENV ) {
            $this->snsUtil = WakuUtil::create();
        } elseif ( 'niji' == PLATFORM_ENV ) {
            $this->snsUtil = NijiUtil::create();
        } else {
            $this->log(__FILE__.__LINE__. ' Platform error ');
            $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM  ));
        }


        if ( !empty($ownerId) && !empty($viewerId) ) {

            // 初回アクセス認証
            if (empty($this->params['qststg_flg'])) {
                $ret =$this->snsUtil->checkSignature(); 
                if (!$ret) {
                    // 検証に失敗した時の処理
                    $this->log(__FILE__.__LINE__.'OAuth Error'); 
                    echo 'error';
                    exit;
                }
            }

            /** WAKU+は全てのリクエストにopensocial_owner_idが付与されている為cookiesetは不要 */
            if ('niji' == PLATFORM_ENV ) {
                if (empty($this->params['paymentId']) && empty($this->params['gacha_id']) 
                    && empty($this->params['item_id']) && empty($this->params['params'])) {

                    $time = time() + (60 * 60 * 24 * 365 * 10);
                    // 初回アクセスが正常に行われている場合はIDをCookieにセット
                    setcookie('opensocial_owner_id', $ownerId,  $time );
                    setcookie('opensocial_viewer_id', $viewerId, $time );
                    $queryString = 'oauth_token=' . $this->params['oauth_token'] . '&oauth_token_secret=' . $this->params['oauth_token_secret'];

                    // 初回に付与されてくるtokenパラメータを保存
                    $this->UserQueryString->begin();
                    try {

                        $values = array(
                            'owner_id'      => $ownerId
                        ,   'query_string'  => $queryString
                        );
                        $this->UserQueryString->save($values);

                    } catch (AppException $e) {
                        $this->UserQueryString->rollback();

                        $this->log($e->errmes);
                        return $this->redirect(
                                   array('controller' => 'errors', 'action' => 'index'
                                         , '?' => array('error' => ERROR_ID_SYSTEM )
                               ));
                    }
                    $this->UserQueryString->commit();
                }
            }

            $this->set('ownerId', $ownerId);
            $this->set('viewerId', $viewerId);

            $this->ownerId  = $ownerId;
            $this->viewerId = $viewerId;
        }

        if (empty($this->ownerId)) {
            if (isset($_COOKIE['opensocial_owner_id']) && isset($_COOKIE['opensocial_viewer_id'])) {
                $this->ownerId  = $_COOKIE['opensocial_owner_id'];
                $this->viewerId = $_COOKIE['opensocial_viewer_id'];
            }
        }

        // 友達招待コールバックは認証をしない
        if (!('FriendInvites' == $this->name && 'callback' == $this->action)) {

            if ( !in_array($this->name, self::$ctlError) ) {

                // メンテナンス
                if ('com' == APP_ENV) {
                    if ('hills' == PLATFORM_ENV) {
                        $testUser = self::$testUserHills;
                    } elseif ('waku' == PLATFORM_ENV) {
                        $testUser = self::$testUserWaku;
                    } elseif ('niji' == PLATFORM_ENV) {
                        $testUser = self::$testUserNiji;
                    }
                    if (!empty(self::$menteNo) && !in_array($this->ownerId, $testUser)) {
                        if (self::$mentePlatform == PLATFORM_ENV || self::$mentePlatform == 'all') {
                            $this->rd('Errors', 'index', array(
                                          'error' => 'mente'
                                       ,  'mente_no' => self::$menteNo    
                                       ));
                        }
                    }
                }

                if ($this->name == 'Tutorials' && $this->action == 'tutorial_1') {
                    $firstAccess = 1;
                }
                if (  (empty($this->ownerId) || empty($this->viewerId) ) && !isset($firstAccess) ) {

                    // Cookieセットされていない場合は不正アクセス
                    $this->log(__FILE__.__LINE__.' Cookie set Error : '. $this->userId ); 
                    $this->rd('Errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
                } else { 

                    // 正常なアクセスの場合はユーザIDをセット
                    $where = array('User.sns_user_id' => $this->ownerId); 
                    $this->userId = $this->User->field('user_id', $where);


                    // ユーザデータ登録
                    if (empty($this->userId) && (!empty($this->ownerId))) {

                        // SNS側より取得
                        $user = $this->snsUtil->getSelf();
                        if (empty($user['displayName'])) {
                             $this->log(__FILE__.__LINE__.'People Api Error'); 
                             $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM ));
                        }

                        $this->User->begin();
                        try {

                            $name   = $user['displayName'];
                            $carrer = $this->carrer = $this->Common->judgeCarrer();

                            $values = array(
                                'sns_user_id'   => $this->ownerId
                            ,   'viewer'        => $this->viewerId
                            ,   'sns_name'      => $name
                            );
                            $ret = $this->SnsUser->save($values);
                            if (!$ret) {
                                throw new AppException(__FILE__.__LINE__.'SnsUser save failed :' . $this->name . '/' . $this->action);
                            }

                            $values = array(
                                'user_name'   => $name
                            ,   'sns_user_id' => $this->ownerId
                            ,   'carrer'      => $carrer
                            );
                            $ret = $this->User->save($values);
                            if (!$ret) {
                                throw new AppException(__FILE__.__LINE__.'User save failed :' . $this->name . '/' . $this->action);
                            }
                            $this->userId = $ret['User']['user_id'];

                            // パラメータ登録
                            $values = array(
                                'user_id'        => $this->userId
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

                        } catch (AppException $e) {
                            $this->User->rollback();

                            $this->log($e->errmes);
                            return $this->redirect(
                                       array('controller' => 'errors', 'action' => 'index'
                                             , '?' => array('error' => ERROR_ID_SYSTEM )
                                   ));
                        }
                        $this->User->commit();
                    }

                    // チュートリアル判定
                    $where = array('user_id' => $this->userId);
                    $endFlg = $this->UserTutorial->field('end_flg', $where);
                    $ary = array_merge(self::$ctlRegist , self::$ctlError);
                    if (!in_array($this->name, $ary)) {
                        // チュートリアルを終えていない
                        if (empty($endFlg)) {
                            $where = array('user_id' => $this->userId);
                            $fields = array('tutorial_id', 'end_flg');
                            $row = $this->UserTutorial->getAllFind($where, $fields, 'first');

                            if (!empty($row['tutorial_id'])) {
                                // チュートリアル途中
                                $this->rd('Tutorials', 'tutorial_'. $row['tutorial_id']);
                            } 
                        }
                    }
                }
            } else {

                if ( !isset($this->params['error']) ) {
                    if ($this->name == 'CakeError') { 
                        // システムエラー
                        $err = ERROR_ID_SYSTEM;
                    } else {
                        // 不正な操作
                        $err = ERROR_ID_BAD_OPERATION;
                    }
                    $this->rd('Errors', 'index', array('error' => $err ));
                }
            }
            $this->set('gameTitle', $this->gameTitle); 
            
            if (empty($endFlg)) {
                $this->tutoEnd = 0;
                $this->set('tutoEnd', 0); 
            } else {
                // チュートリアルを終えている
                $this->tutoEnd = 1;
                $this->set('tutoEnd', 1); 

                // ユーザーステータス取得
                $this->userParam = $this->UserParam->getUserParams($this->userId);

                // 行動力回復
                $this->UserParam->recoverAct($this->userParam);

                // BP回復
                $this->UserParam->recoverBp($this->userParam);

                // 所持金
                $this->set('haveMoney', $this->userParam['money']);

                // 各パラメタ
                $this->set('userParam', $this->userParam);
            }

            if ($this->User->isSnsDataUpdate($this->userId)) {

                $user = $this->snsUtil->getSelf();

                if (empty($user['displayName'])) {
                    $this->log($this->userId.__FILE__.__LINE__. 'get sns user name error');
                    $this->rd('Errors', 'index', array('error' => ERROR_ID_SYSTEM  ));
                }

                $this->User->begin();
                try {

                    $name   = $user['displayName'];

                    $values = array(
                        'sns_user_id'   => $this->ownerId
                    ,   'viewer'        => $this->viewerId
                    ,   'sns_name'      => $name
                    );
                    $this->SnsUser->save($values);

                    $values = array(
                        'user_id' => $this->userId
                    ,   'user_name'   => $name
                    );
                    $this->User->save($values);

                } catch (AppException $e) {
                    $this->User->rollback();

                    $this->log($e->errmes);
                    return $this->redirect(
                               array('controller' => 'errors', 'action' => 'index'
                                     , '?' => array('error' => ERROR_ID_SYSTEM )
                           ));
                }
                $this->User->commit();
            }

            // イベント
            $this->event = $this->EvQuest->isEvent();
            if (!empty($this->event)) {
                $this->event['end_time'] = $this->Common->changeTimeStrS ($this->event['end_time']);
            }
            // レイドイベント
            $this->raidEvent = $this->EvRaid->isEvent();
            if (!empty($this->raidEvent)) {
                $this->raidEvent['end_time_st'] = $this->Common->changeTimeStrS ($this->raidEvent['end_time']);
            }

            // ページング
            $this->page = !empty($this->params[KEY_PAGING]) ? $this->params[KEY_PAGING] : 1;
            $this->offset = ($this->page - 1) * PAGE_LIMIT;

            $this->set('prev', $this->page - 1 ); 
            $this->set('page', $this->page ); 
            $this->set('next', $this->page + 1 ); 


            // 共通レイアウトは使わない  
            if ($this->name == 'Tutorials' && $this->action == 'tutorial_1') {
                $this->layout = '';
            }

            // ajax通信時使用
            if ('hills' != PLATFORM_ENV) {
                $this->ownerInfo = 'opensocial_owner_id=' . $this->ownerId . '&opensocial_viewer_id=' . $this->viewerId;
                $this->ownerInfo .= '&qststg_flg=1';
            }

            // 現在到達最大ステージ
            $stageId = $this->UserStage->getUserMaxStageId($this->userId);

            // 次のステージ
            $nextStageId = $stageId + 1;

            if ( 31 == $nextStageId ) {

                $field = array('state');
                $where = array(
                             'user_id'  => $this->userId
                         ,   'stage_id' => $stageId
                         );
                $maxStage = $this->UserStage->getAllFind($where, $field, 'first');

                if ( 3 == $maxStage['state'] ) {
                    // 次のステージへ
                    $fields = array('user_id', 'stage_id', 'progress', 'state');
                    $values = array();
                    $values[] = array($this->userId, $nextStageId, 0, 1);
                    $this->UserStage->insertBulk($fields, $values, $ignore = 1);
                }
            }

            // コントローラとアクション
            $this->set('ctl', $this->name ); 
            $this->set('action',  $this->action); 
            $this->set('ctlAction',  $this->name . '/' . $this->action); 
            $this->set('event', $this->event);
            $this->set('raidEvent', $this->raidEvent);

            // URLアサイン
            $this->_setUrl();
        }
    } 

    /**
     * URLアサイン
     *
     * @author imanishi 
     * @return void
     */
    private function _setUrl() {

        // マイページ
        $this->set('linkUser', BASE_URL . 'Users/index'); 
        // クエスト
        $this->set('linkQuest', BASE_URL . 'Quests/index'); 
        // ステージ
        $this->set('linkStage', BASE_URL . 'Stages/index'); 
        // 強化進化
        $this->set('linkUserCard', BASE_URL . 'UserCards/index'); 
        // ガチャ
        $this->set('linkGacha', BASE_URL . 'Gachas/index'); 
        // トップ
        $this->set('linkSnsUser', BASE_URL . 'SnsUsers/index'); 
        // デッキ
        $this->set('linkDeck', BASE_URL . 'UserDeckCards/index'); 
        // 受取ボックス
        $this->set('linkPbox', BASE_URL . 'UserPresentBoxes/index'); 
        // アイテム
        $this->set('linkUserItem', BASE_URL . 'UserItems/index'); 
        // ショップ
        $this->set('linkItem', BASE_URL . 'Items/index'); 
        // バトル
        $this->set('linkUserParam', BASE_URL . 'UserParams/index'); 
        // シーン鑑賞
        $this->set('linkScene', BASE_URL . 'UserStages/index'); 
        // ヘルプ
        $this->set('linkStaticPage', BASE_URL . 'StaticPages/index'); 
        // 図鑑
        $this->set('linkCollect', BASE_URL . 'UserCollects/index'); 
        // レイドボス
        $this->set('linkRaid', BASE_URL . 'RaidQuests/index'); 
        // カード
        $this->set('linkCard', BASE_URL . 'UserCards/cardList'); 
        // ランキング
        $this->set('linkRank', BASE_URL . 'Ranks/index'); 
    }

    /**
     * ソート項目をセット
     *
     * @author imanishi 
     * @return void 
     */
    public function setSort() {
         
        
        // レア度
        $rareLevelSelect = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        if (!empty($this->request->data['rare_level'])) {
            $rareLevelSelect = $this->request->data['rare_level'];
        }

        $this->set('rareLevel', $this->rareLevel); 
        $this->set('rareLevelSelect', $rareLevelSelect); 

        // 項目
        $sortItemSelect = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;
        if (!empty($this->request->data['sort_item'])) {
            $sortItemSelect = $this->request->data['sort_item'];
        }

        $this->set('sortItem', $this->sortItem); 
        $this->set('sortItemSelect', $sortItemSelect); 
    }

    /**
     * リダイレクト
     *
     * @author imanishi 
     * @param string $ctl 遷移先コントローラー名
     * @param string $act 遷移先アクション名
     * @param array  $params 付属パラメート
     */
    public function rd($ctl, $act, $params = array()) { 
        return $this->redirect(array('controller' => $ctl, 'action' => $act 
                   , '?' => $params)); 
    } 
}
