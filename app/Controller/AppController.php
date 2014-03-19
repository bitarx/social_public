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

    public $uses = array('SnsUser', 'User', 'UserTutorial');

    public $components = array('Cookie', 'Common');

    public $ownerId  = "";
    public $viewerId = "";
    public $userId   = 0;
    public $params   = array();

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
$this->log('&&&&&&&&&&&&&:'); 
$this->log($this->name); 
        if ( !in_array($this->name, self::$ctlError)
            && ('SnsUsers' != $this->name && 'index' != $this->action)
            && (!$this->ownerId || !$this->viewerId)) {

$this->log('Error!!!!!'); 
            // Cookieセットされていない場合は不正アクセス
            $this->rd('Errors', 'index', array('error' => 1 ));
        } else { 
            // 正常なアクセスの場合はユーザIDをセット
$this->log('ownerId:'. $this->ownerId); 
            $where = array('User.sns_user_id' => $this->ownerId); 
            $this->userId = $this->User->field('user_id', $where);


            // ユーザデータ登録
            $this->User->begin();
            try {
                if (empty($this->userId)) {
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
                }

            } catch (AppException $e) {
    $this->log('###############################:');
                $this->User->rollback();

                $this->log($e->errmes);
                return $this->redirect(
                           array('controller' => 'errors', 'action' => 'index'
                                 , '?' => array('error' => 2)
                       ));
            }
            $this->User->commit();

$this->log('AppuserId:'. $this->userId); 

            // チュートリアル判定
            $where = array('user_id' => $this->userId);
            $fields = array('tutorial_id', 'end_flg');
            $row = $this->UserTutorial->getAllFind($where, $fields, 'first');

            $ary = array_merge(self::$ctlRegist , self::$ctlError);
$this->log('name:'. $this->name); 
            if (!in_array($this->name, $ary)) {
$this->log('aaaaaaaaaaaaaaaaa:'. $this->userId); 
                // チュートリアルを終えていない
                if (empty($row['end_flg'])) {
$this->log('bbbbbbbb:'. $this->userId); 
                    if (!empty($row['UserTutorial']['tutorial_id'])) {
$this->log('tuto:' . $row['UserTutorial']['tutorial_id']); 
                        // チュートリアル途中
                        return $this->rd('Tutorials', 'tutorial_'. $row['UserTutorial']['tutorial_id']);
                    } else {
$this->log('tutoFIrst:' . $row['UserTutorial']['tutorial_id']); 
                        // チュートリアル初めて
                        return $this->rd('Tutorials', 'tutorial_1');
                    }
                }
            }
        }
        $this->set('gameTitle', $this->gameTitle); 

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
        // 強化進化
        $this->set('linkUserCard', BASE_URL . 'UserCards/index'); 
        // ガチャ
        $this->set('linkGacha', BASE_URL . 'Gachas/index'); 
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
