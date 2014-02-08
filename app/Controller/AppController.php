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

    public $uses = array('SnsUser');

    public static $ownerId = '';
    public static $viewerId = '';

    // SnsUserテーブルにデータがなくても処理される
    public static $preRegist = array('Tutorials', 'Errors');

    public function beforeFilter() { 
var_dump($this->name);
var_dump($this->action);
         
        $fields = array('id');

        self::$ownerId  = isset($this->request->query['opensocial_owner_id']) ? $this->request->query['opensocial_owner_id'] : '';
        self::$viewerId = isset($this->request->query['opensocial_viewer_id']) ? $this->request->query['opensocial_viewer_id'] : '';

        if ($this->name != 'Errors' && (!self::$ownerId || !self::$viewerId) ) {
            return $this->redirect
                (array('controller' => 'errors', 'action' => 'index'
                , '?' => array('error' => 1)));
        }

        $where = array(
            'id' => self::$ownerId
        ,   'viewer' => self::$viewerId
        );
        $list = $this->SnsUser->getAllFind($where, $fields);
        if (empty($list) && !in_array($this->name , self::$preRegist)) {
            return $this->redirect(array('controller' => 'tutorials', 'action' => 'index'));
        }
    } 
}
