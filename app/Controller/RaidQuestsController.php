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

    public $uses = array('RaidUserStage', 'RaidQuest', 'EvRaidRankFirst', 'EvRaidRankSecond');

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

        $eventTitle = '';
        $start = "";
        $middle = "";
        $end = "";
        $rankList = array();
        $eventStr = "";
        $topPercent = "";
        if (!empty($this->raidEvent['title'])) {
            $eventTitle = '<span style="color:#FFA500">[EVENT]</span>' . $this->raidEvent['title'];

            $now  = $this->Common->nowDate();

            $tarm = 1;
            if ($now < $this->raidEvent['1st_end_time']) {
                // 前半
                $tarmEndStr = $this->Common->changeTimeStrS($this->raidEvent['1st_end_time']);
                $tmName = '前半';
                $md = $this->EvRaidRankFirst;
            } else {
                // 後半
                $tarmEndStr = $this->Common->changeTimeStrS($this->raidEvent['end_time']);
                $tarm = 2;
                $tmName = '後半';
                $md = $this->EvRaidRankSecond;
            }
            $eventStr = $tmName . '戦終了は' . $tarmEndStr;

            $curRank = $md->getCurRank($this->userId);

            $maxRank = $md->getMaxRank();

            $topPercent = 0;
            if (!empty($curRank)) {
                $topPercent = floor(100 * ($curRank / $maxRank));
            }

            $rankList = $md->getSelfRankList($this->userId);

            // 期間文字列
            $start = $this->Common->changeTimeStrS($this->raidEvent['start_time']);
            $middle = $this->Common->changeTimeStrS($this->raidEvent['1st_end_time']);
            $end = $this->Common->changeTimeStrS($this->raidEvent['end_time']);
        }

        $this->set('list', $list);
        $this->set('start', $start);
        $this->set('middle', $middle);
        $this->set('end', $end);
        $this->set('rankList', $rankList);
        $this->set('eventStr', $eventStr);
        $this->set('topPercent', $topPercent);
        $this->set('subTitle', $eventTitle);
        $this->set('title', self::$title);
	}

}
