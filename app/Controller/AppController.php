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

    public $uses = array('SnsUser', 'User', 'UserTutorial');

    public $components = array('Cookie');

    public $ownerId  = "";
    public $viewerId = "";
    public $userId   = 0;
    public $params   = array();

    public static $preRegist = array('Tutorials');

    public static $preError = array('CakeError', 'Errors');

    public final function beforeFilter() { 
        
        $this->params =  $this->request->query;
        
        $this->ownerId  = $this->Cookie->read('owner_id');
$this->log('cookie' . $this->ownerId);      
        $this->viewerId = $this->Cookie->read('viewer_id');

        if (!empty($this->ownerId)) {
            $where = array('User.id' => $this->ownerId); 
            $this->userId = $this->User->field('id', $where);
        }

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
