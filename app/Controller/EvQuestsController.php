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

    public $uses = array('EvQuest', 'EvPresent');

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
     * prologue method
     *
     * @author imanishi 
     */
	public function prologue() {

        $list = $this->EvPresent->getList($this->event['ev_quest_id']);

        $this->set('title', self::$strPref . $this->event['quest_title']);
        $this->set('list', $list);
        $this->set('subTitle',  'イベントクリア報酬');
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
