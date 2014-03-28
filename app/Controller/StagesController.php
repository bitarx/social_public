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

    public $uses = array('UserStage', 'Enemy', 'UserDeck', 'Stage', 'UserCurStage', 'UserParam', 'StageProb', 'UserCard');

    /**
     *　定数
     *
     */
    const STAGE_PROG_NORMAL = 2; // 通常進行

    const STAGE_PROG_HIGHT  = 5; // 全力進行


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
        } catch (AppException $e) { 
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

        // 行動力有無判定
        $notAct = 0;
        if ($userParam['act'] < $data['use_act']) {
            $notAct = 1;
        }
$this->log('main_params:'. $params); 
        $this->set('data', $data);
        $this->set('userParam', $userParam);
        $this->set('param', $params);
        $this->set('prog', $data['progress']);
        $this->set('act', $userParam['act']);
        $this->set('exp', $userParam['exp']);
        $this->set('notAct', $notAct);
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
        $this->set('data', $enemyData);

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
     * 登録更新
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function init() {
$this->log('aaaaaaaaaaaaaa:');

        if ($this->request->is(array('ajax'))) {
$this->log('bbbbbbbbbbbbbbbb:');
            $userId = $this->userId;

            // 進行度の基本
            $baseInt = self::STAGE_PROG_NORMAL;

            // 取得対象のデータ
            $targetData = array(
                'name' => "" 
            ,   'id'   => 0
            );
$this->log('userId;:'. $userId);
            $data = $this->params['params'];
            $data = (array)json_decode($data);
            $data['user_id'] = $userId;

            // 現在のユーザステージ情報取得
            $userStageData = $this->UserStage->getUserStage($userId, $data['stage_id']);
            $data['progress'] = $userStageData['progress'];

            // ユーザステータス取得
            $userParam = $this->UserParam->getUserParams($userId);

            // 行動力チェック
 $this->log('actCheck:'); 
 $this->log('act:'. $userParam['act']); 
 $this->log('use_act:'); 
            if ($userParam['act'] < $userStageData['use_act']) {
 $this->log('actFusoku:'); 

                // 不足の場合は不正
                $ary = array('result' => 2);
                $this->setJson($ary);
                return false;
            }

            // 何かもらえるかどうか
            $lotData['kind']   = 0;
            $lotData['target'] = 0;
            $lotData['num']    = 0;
            $hit = mt_rand(1, 100);
            if ($hit <= $userStageData['prob_get']) {
                // 抽選
                $list = $this->StageProb->getStageProb($data['stage_id']);
                $lotData = $this->Common->doLot($list);
 
            }

            $this->UserStage->begin(); 
            try {
                // 入手カード振込など
                switch($lotData['kind'])
                {
                    // カード
                    case KIND_CARD:
                        $row = array();
                        $this->UserCard->registCard($userId, $lotData['target'], $lotData['num'], $row);
                        $targetData['name'] = $row['card_name'];
                        $targetData['id']   = $row['card_id'];

                        break;
                    // アイテム
                    case KIND_ITEM:
                        break;
                    // ゴールド
                    case KIND_GOLD:
                        $userParam['money'] += $lotData['num'];
                        break;
                    // 敵
                    case KIND_ENEMY:
                        break;
                    // 全力進行
                    case KIND_PROG_HIGHT:
                        $baseInt = self::STAGE_PROG_HIGHT;
                        break;
                    // 出会い
                    case KIND_NEW_FRIEND:
                        break;
                }

                $range   = 1;

                // 進行度アップ
                $stageClear = 0;
                $nextStageId = $data['stage_id'];
                if ($data['progress'] < 100) {

                    $add = $this->Common->lotRange($baseInt, $range);
                    $data['progress'] = $data['progress'] + $add;

                    if (100 <= $data['progress']) { 
                        // ステージクリア
                        $data['progress'] = 100;
                        $data['state'] = 2;
                        $value = array(
                            'progress' => $data['progress']
                        ,   'state'    => $data['state']
                        ,   'modified' => "'" . date("Y-m-d H:i:s") . "'"
                        );
                        $where = array(
                            'user_id' => $this->userId 
                        ,   'UserStage.stage_id' => $data['stage_id']     
                        );
                        $this->UserStage->updateAll($value, $where);

                        // 新ステージ登録(ここではせず、ボス討伐後)
                        $nextStageId = $data['stage_id'] + 1;
/*
                        $fields = array('user_id', 'stage_id', 'progress', 'state');
                        $values[] = array($data['user_id'], $nextStageId, 0, 1);
                        $this->UserStage->insertBulk($fields, $values, $ignore = 1);
*/

                        $stageClear = 1;
                    } else {
                        $this->UserStage->initUserStage($data);    
                    }
                }


                // 行動力の減算
                $notAct = 0;
                $userParam['act'] -= $userStageData['use_act'];
                if ($userParam['act'] < 0) $userParam['act'] = 0;
                if ($userParam['act'] < $userStageData['use_act']) $notAct = 1;

                // 経験値アップ
                $levelUp = 0;
                $getExp = $this->Common->lotRange($userStageData['use_act'], $range);
                $userParam['exp'] += $getExp;
                if (100 < $userParam['exp']) {
                    $userParam['exp'] = 0;
                    $userParam['level']++;
                    $levelUp = 1;
                }
                $this->UserParam->setUserParams($userId, $userParam);

     
                // 返却データを配列に格納
                $ary = array(
                    'result'   => 1
                ,   'progress' => $data['progress']     
                ,   'kind'     => $lotData['kind']
                ,   'target'   => $lotData['target']     // 取得対象のid
                ,   'num'      => $lotData['num']        // 取得対象の個数（金額）
                ,   'exp'      => $userParam['exp']
                ,   'act'      => $userParam['act']      
                ,   'not_act'  => $notAct                // 行動力切れの場合1
                ,   'level'    => $userParam['level']    // レベル
                ,   'level_up' => $levelUp               // レベルアップの場合1
                ,   'stage_clear' => $stageClear         // ステージクリアの場合1 
                ,   'stage_id' => $data['stage_id']      // ステージID
                ,   'name'     => $targetData['name']    // 入手物の名前
                );
            } catch (AppException $e) { 
                $this->UserStage->rollback(); 
                $this->log($e->errmes);
                $ary = array('result' => 2);
            } 
            $this->UserStage->commit(); 

        } else {
            $ary = array('result' => 2);
        }

        $this->setJson($ary);
	}


}
