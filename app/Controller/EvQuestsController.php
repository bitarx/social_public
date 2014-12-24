<?php
App::uses('ApiController', 'Controller');
/**
 * EvQuests Controller
 *
 * @property EvQuest $EvQuest
 * @property PaginatorComponent $Paginator
 */
class EvQuestsController extends ApiController {

    public static $strPref   = '[プロローグ]';
    public static $strPrefEp = '[エピローグ]';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Common');

    public function beforeFilter(){
        parent::beforeFilter();
        if(empty($this->event)) {
            $this->rd('errors', 'index', array('error' => END_EVENT )); 
        }

    }

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

	}

    /**
     * prologue method
     *
     * @author imanishi 
     */
	public function prologue() {

        $this->set('title', self::$strPref . $this->event['quest_title']);
	}

    /**
     * epilogue method
     *
     * @author imanishi 
     */
	public function epilogue() {

        $this->set('title', self::$strPrefEp . $this->event['quest_title']);
	}

}
