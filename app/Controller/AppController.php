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

    public $components = array('Cookie');

    public $ownerId  = "";
    public $viewerId = "";

    // SnsUserテーブルにデータがなくても処理される
    public static $preRegist = array('Tutorials');

    public static $preError = array('CakeError', 'Errors');

    public function beforeFilter() { 
var_dump($this->name);
var_dump($this->action);
         
        /*
            return $this->redirect
                (array('controller' => 'errors', 'action' => 'index'
                , '?' => array('error' => 1)));
        */
        
        $this->ownerId  = $this->Cookie->read('owner_id');
        $this->viewerId = $this->Cookie->read('viewer_id');

    } 
}
