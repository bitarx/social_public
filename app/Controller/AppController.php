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

    public final function beforeFilter() { 
        
        $this->params =  $this->request->query;

        // 正常な初回アクセスはリクエストにIDが含まれる
        $ownerId  = isset($this->params['opensocial_owner_id']) ? $this->params['opensocial_owner_id'] : '';
        $viewerId = isset($this->params['opensocial_viewer_id']) ? $this->params['opensocial_viewer_id'] : '';

        if ( !empty($ownerId) && !empty($viewerId) ) {

//$this->log('setcookie :' . $ownerId);      
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

$this->log('ownerId:'. $this->ownerId); 
$this->log('className:'. $this->name); 
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
$this->log('userIdErr:'. $this->userId); 
$this->log('Errors&&&&&&&&&&&&&&&&&&&&&&&&&&&&&:'); 
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

        // コントローラとアクション
        $this->set('curAct', $this->name . '/' . $this->action); 
$this->log('aryDataServer:' . print_r($_SERVER, true)); 
        // キャリア（1:Android 2:iPhone）
        $carrer = 1;
        if (isset($_SERVER['HTTP_USER_AGENT'] && false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')) $carrer = 2;
        $this->set('carrer', $carrer); 

$this->log('userId:'. $this->userId); 
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
        $this->set('linkDeck', BASE_URL . 'Deck/index'); 
        // プレゼントボックス
        $this->set('linkPbox', BASE_URL . 'PresentBoxes/index'); 
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
