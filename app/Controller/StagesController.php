<?php
App::uses('ApiController', 'Controller');
/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Battle');

    public $uses = array('UserStage', 'Enemy', 'UserDeck', 'Stage', 'UserCurStage', 'UserParam', 'StageProb');



    /**
     * ステージ一覧
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        $questId = $this->params['quest_id'];

        // 到達したステージリスト
        $ret = $this->UserStage->getUserStage($this->userId, $stageId = 0, $recu = 0);

        // このクエストは初めて
        if (empty($ret)) {
            $list[] = $this->Stage->getFirstStage($questId);
        } else {
            // 現在のクエストステージを抽出
            foreach ($ret as $val)  {
                if ($val['quest_id'] == $questId) {
                    $list[] = $val;
                }
            }
        }
        $this->set('list', $list);
	}

    /**
     * 現在のステージ更新
     *
     * @author imanishi 
     * @return void
     */
	public function initStage() {

        $first = 0;
        $stageId = $this->params['stage_id'];

        // 現在到達最大stageId
        $curMaxStageId = $this->UserStage->getUserMaxStageId($this->userId);

        // 初めてのアクセス
        if (empty($curMaxStageId)) {
            $curMaxStageId = 1;
            $stageId = 1;
            $first = 1;
        }

        // 不正
        if ( ($curMaxStageId < $stageId) || empty($stageId) ) {
            $this->rd('errors', 'index', array('error' => 2)); 
        }

        $this->UserCurStage->begin(); 
        try {
            if ($first == 1) {
                $values = array(
                    'user_id'  => $this->userId  
                ,   'stage_id' => $stageId
                ,   'progress' => 0
                ,   'state'    => 1
                );
                $this->UserStage->save($values);    
            }
            $values = array(
                'user_id' => $this->userId  
            ,   'stage_id' => $stageId
            );
            $this->UserCurStage->save($values);    
        } catch (Exception $e) { 
            $this->UserCurStage->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserCurStage->commit(); 

        $params = array('stage_id' => $stageId);
        $this->rd('Stages', 'main', $params);
    }

    /**
     * クエスト実行
     *
     * @author imanishi
     * @return void
     */
    public function main() {

        $stageId = $this->params['stage_id'];

        $data = $this->UserStage->getUserStage($this->userId, $stageId, $recu = 2);
        $userParam = $this->UserParam->getUserParams($this->userId);

        $params = array(
            'stage_id' => $stageId
        ,   'quest_id' => $data['quest_id']
        ,   'progress' => $data['progress']
        ,   'state'    => $data['state']
        );

        $params = json_encode($params);
$this->log('main_params:'. $params); 
        $this->set('data', $data);
        $this->set('userParam', $userParam);
        $this->set('param', $params);
        $this->set('prog', $data['progress']);
    }

    /**
     * ボス戦前
     *
     * @author imanishi
     * @return void
     */
    public function conf() {

        $stageId = $this->params['stage_id'];

        $userStageData = $this->UserStage->getUserStage($this->userId, $stageId);
        $enemyData = $this->Enemy->getEnemyData($userStageData['enemy_id']);
        $this->set('enemyData', $enemyData);

    }

    /**
     * ボス戦実行
     *
     * @author imanishi
     * @return void
     */
    public function act() {
        
        $targetId = $this->params['target_id'];

        // 防御側のデッキ取得
        $target = $this->Enemy->getEnemyData($targetId);
        $targetCards[]['UserCard'] = $target;

        // 攻撃側のデッキ取得
        $userCards = $this->UserDeck->getUserDeckData($this->userId);

        $userCards = $userCards['UserDeckCard'];

        // 攻撃側のスキル発動
        foreach ($userCards as $key => $val) {
            $userCard = $val['UserCard'];
            $hit = mt_rand(1, 100);
            // 当選
            if ($hit <= $userCard['skill_level']) {
                // カードのスキル取得 
                $skillData = $this->Card->getCardData($userCard['card_id']);
                // スキル実行
                $this->Battle->doSkill($skillData, $key, $userCards, $targetCards);
            }
        }

        // 防御側のスキル発動
        foreach ($targetCards as $key => $val) {
            $userCard = $val['UserCard'];
            $hit = mt_rand(1, 100);
            // 当選
            if ($hit <= $userCard['skill_level']) {
                // カードのスキル取得 
                $skillData = $this->Card->getCardData($userCard['card_id']);

                // スキル実行
                $this->Battle->doSkill($skillData, $key, $userCards, $targetCards);
            }
        }
        
        // 1:攻撃側勝利 2:防御側勝利
        $winner = 1;
        while(true) {
            $targetCards = $this->Battle->doBattle($userCards, $targetCards);
            if (empty($targetCards)) break;

            $userCards = $this->Battle->doBattle($targetCards, $userCards);
            if (empty($userCards)) {
                $winner = 2;
                break;
            }
        }

        $this->rd('Stages', 'product');
    }

    /**
     * ボス戦
     *
     * @author imanishi
     * @return void
     */
    public function product() {
/*
        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
*/
    }

    /**
     * ボス戦後
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $this->BattleLog->getBattleLogDataLatest($this->userId);
        $this->set('data', $data);

    }

    /**
     * クエスト完了
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * データ取得(更新不可)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this->Stage->getAllFind($this->request->query, $fields);
            $this->setJson($list);
        }
    }

    /**
     * 登録更新(変更禁止)
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function init() {
$this->log('aaaaaaaaaaaaaa:');

        if ($this->request->is(array('ajax'))) {
$this->log('bbbbbbbbbbbbbbbb:');
            $userId = $this->userId;
$this->log('userId;:'. $userId);
            $data = $this->params['params'];
            $data = (array)json_decode($data);
            $data['user_id'] = $userId;

            // 現在のユーザステージ情報取得
            $stageData = $this->UserStage->getUserStage($userId, $data['stage_id']);
            $data['progress'] = $stageData['progress'];

            $this->UserStage->begin(); 
            try {

                // 抽選
                $list = $this->StageProb->getStageProb($data['stage_id']);
                $lotData = $this->Common->doLot($list);

                if ($data['progress'] < 100) {
                    $data['progress'] = $data['progress'] + 1;
                }
                $this->UserStage->initUserStage($data);    
     
                $ary = array(
                    'result'   => 1
                ,   'progress' => $data['progress']     
                ,   'kind'     => $lotData['kind']
                );
            } catch (Exception $e) { 
                $this->UserStage->rollback(); 
                $this->log($e->errmes);
                $ary = array('result' => 2);
            } 
            $this->UserStage->commit(); 

$this->log('cccccccccccc:');
        } else {
$this->log('eeeeeeeeeeeeee:');
            $ary = array('result' => 2);
        }

$this->log('fffffffffff:');
        $this->setJson($ary);
	}


}
