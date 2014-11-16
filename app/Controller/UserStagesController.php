<?php
App::uses('ApiController', 'Controller');
/**
 * UserStages Controller
 *
 * @property UserStage $UserStage
 * @property PaginatorComponent $Paginator
 */
class UserStagesController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Common');

	public $uses = array('UserStage', 'Quest', 'Enemy');

    /**
     * シーン鑑賞
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = array();
        $where  = array(
            'user_id' => $this->userId
        ,   'state'   => 3     
        );
        $pageAll = 0;
 $this->log('#########################333'); 
  $this->log($this->offset); 
        $list = $this->UserStage->getUserStageForScene($where, $fields, $limit=PAGE_LIMIT, $this->offset, $pageAll);

        $this->set('list', $list);
        $this->set('pageAll', $pageAll);

	}

}
