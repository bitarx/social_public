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

	public $uses = array('UserStage', 'Quest', 'Enemy', 'EvUserStage');

    /**
     * シーン鑑賞
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        // 1:通常 2:イベント
        $kind = isset($this->params['kind']) ? $this->params['kind']:1;

        $fields = array();
        $where  = array(
            'user_id' => $this->userId
        ,   'state'   => 3     
        );
        $pageAll = 0;

        if (1 == $kind) {
            $list = $this->UserStage->getUserStageForScene($where, $fields, $limit=PAGE_LIMIT, $this->offset, $pageAll);
            $targetCtl = 'Stages';
        } else {
            $list = $this->EvUserStage->getUserStageForScene($where, $fields, $limit=PAGE_LIMIT, $this->offset, $pageAll);
            $targetCtl = 'EvStages';
        }

        $this->set('list', $list);
        $this->set('kind', $kind);
        $this->set('targetCtl', $targetCtl);
        $this->set('pageAll', $pageAll);

	}

}
