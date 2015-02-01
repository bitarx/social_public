<?php
App::uses('ApiController', 'Controller');
/**
 * Quests Controller
 *
 * @property Quest $Quest
 * @property PaginatorComponent $Paginator
 */
class RaidQuestsController extends ApiController {

    protected static $title = 'レイドボス';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('RaidUserStage', 'RaidQuest');

    /**
     * プレイ可能なクエスト一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {
        
        // 到達したステージリスト
        $userStageList = $this->RaidUserStage->getUserStage($this->userId, $stageId = 0, $recu = 2);

        // 到達クエスト
        if (!empty($userStageList[0]['quest_id'])) {
            $questId = $userStageList[0]['quest_id'];
        } else {
            $questId = 1;
        }

        $list = $this->RaidQuest->getQuestList($questId);

        $this->set('list', $list);
        $this->set('title', self::$title);
	}

}
