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
     * 定数
     *
     * @var array
     */
    public $gameTitle = '鎮激のエロイース';

    // 確率変動アイテム文言
    public $effectStr = array(
                            3 => 'カード出現率アップ'
                        ,   4 =>  'ゴールド出現率アップ'
                        );


    public $viewClass = 'Smarty';

    public $uses = array('SnsUser', 'User', 'UserTutorial', 'UserParam');

    public $components = array('Cookie', 'Common');

    public $ownerId  = "";
    public $viewerId = "";
    public $userId   = 0;
    public $params   = array();
    public $userParam  = array();

    public static $ctlRegist = array('Tutorials');

    public static $ctlError = array('CakeError', 'Errors');

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

    public final function beforeFilter() { 
        
        $this->params =  $this->request->query;

        // 正常な初回アクセスはリクエストにIDが含まれる
        $ownerId  = isset($this->params['opensocial_owner_id']) ? $this->params['opensocial_owner_id'] : '';
        $viewerId = isset($this->params['opensocial_viewer_id']) ? $this->params['opensocial_viewer_id'] : '';

        if ( !empty($ownerId) && !empty($viewerId) ) {

            // 初回アクセスが正常に行われている場合はIDをCookieにセット
            $this->Cookie->write('owner_id', $ownerId, true, '+20 years');
            $this->Cookie->write('viewer_id', $viewerId, true, '+20 years');
        }

        if (false !== strpos($_SERVER['SCRIPT_FILENAME'], 'Console')) {
            // コンソールからのテスト
            $this->ownerId  = 1;
            $this->viewerId = 1;
        } else {
            $this->ownerId  = $this->Cookie->read('owner_id');
            $this->viewerId = $this->Cookie->read('viewer_id');
        }

        if ( !in_array($this->name, self::$ctlError) ) {
            if ( (empty($this->ownerId) || empty($this->viewerId) ) ) {

                // Cookieセットされていない場合は不正アクセス
                $this->rd('Errors', 'index', array('error' => 1 ));
            } else { 
                // 正常なアクセスの場合はユーザIDをセット
                $where = array('User.sns_user_id' => $this->ownerId); 
                $this->userId = $this->User->field('user_id', $where);


                // ユーザデータ登録
                if (empty($this->userId)) {
                    $this->User->begin();
                    try {

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
                                         , '?' => array('error' => 2)
                               ));
                    }
                    $this->User->commit();
                }

                // チュートリアル判定
                $where = array('user_id' => $this->userId);
                $fields = array('tutorial_id', 'end_flg');
                $row = $this->UserTutorial->getAllFind($where, $fields, 'first');

                $ary = array_merge(self::$ctlRegist , self::$ctlError);
                if (!in_array($this->name, $ary)) {
                    // チュートリアルを終えていない
                    if (empty($row['end_flg'])) {
                        if (!empty($row['UserTutorial']['tutorial_id'])) {
                            // チュートリアル途中
                            $this->rd('Tutorials', 'tutorial_'. $row['UserTutorial']['tutorial_id']);
                        } else {
                            // チュートリアル初めて
                            $this->rd('Tutorials', 'tutorial_1');
                        }
                    }
                }
            }
        } else {

            if ( !isset($this->params['error']) ) {
                if ($this->name == 'CakeError') { 
                    // システムエラー
                    $err = 2;
                } else {
                    // 不正な操作
                    $err = 1;
                }
                $this->rd('Errors', 'index', array('error' => $err ));
            }
        }
        $this->set('gameTitle', $this->gameTitle); 
        
        if (empty($row['end_flg'])) {
            $this->set('tutoEnd', 0); 
        } else {
            // チュートリアルを終えている
            $this->set('tutoEnd', 1); 

            // ユーザーステータス取得
            $this->userParam = $this->UserParam->getUserParams($this->userId);

            // 行動力回復
            $this->UserParam->recoverAct($this->userParam);
        }

        // ページング
        $this->page = !empty($this->params[KEY_PAGING]) ? $this->params[KEY_PAGING] : 1;
        $this->offset = ($this->page - 1) * PAGE_LIMIT;

        $this->set('prev', $this->page - 1 ); 
        $this->set('page', $this->page ); 
        $this->set('next', $this->page + 1 ); 

        // コントローラとアクション
        $this->set('ctl', $this->name ); 
        $this->set('action',  $this->action); 
        $this->set('ctlAction',  $this->name . '/' . $this->action); 

        // キャリア（1:Android 2:iPhone）
        $carrer = 1;
        if (isset($_SERVER['HTTP_USER_AGENT']) && false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')) $carrer = 2;
        $this->set('carrer', $carrer); 
$this->log('userId:' . $this->userId ); 
        // URLアサイン
        $this->_setUrl();
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
        // プレゼントボックス
        $this->set('linkPbox', BASE_URL . 'UserPresentBoxes/index'); 
        // アイテム
        $this->set('linkUserItem', BASE_URL . 'UserItems/index'); 
        // ショップ
        $this->set('linkItem', BASE_URL . 'Items/index'); 
        // バトル
        $this->set('linkUserParam', BASE_URL . 'UserParams/index'); 
        // シーン鑑賞
        $this->set('linkUserStages', BASE_URL . 'UserStages/index'); 
        // ヘルプ
        $this->set('linkStaticPage', BASE_URL . 'StaticPages/index'); 
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

        $this->set('rareLevel', $this->rareLevel); 
        $this->set('rareLevelSelect', $rareLevelSelect); 

        // 項目
        $sortItemSelect = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;

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
