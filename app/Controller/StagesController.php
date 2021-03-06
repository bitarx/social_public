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

    public $uses = array('UserStage', 'Enemy', 'UserDeck', 'Stage', 'UserCurStage', 'UserParam', 'StageProb', 'UserCard', 'BattleLog', 'Card', 'UserLastActTime', 'Quest', 'UserStageEffect', 'Skill', 'UserCollect', 'UserPresentBox');

    /**
     *　定数
     *
     */
    const STAGE_PROG_NORMAL = 5; // 通常進行

    const STAGE_PROG_HIGHT  = 15; // 全力進行

    public function beforeFilter(){
        parent::beforeFilter();

    }


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
            $questData = $this->Quest->getQuestData($questId);
            $list[0]['quest_detail'] = $questData['quest_detail'];
        }

        $this->set('list', $list);
        $this->set('guideId', 1 );
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
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
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
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
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

        // 到達していない
        if (!isset($data['progress'])) {
            $this->log('Stage Access Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

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

        // 確率変動アイテムの使用確認
        $list = array();
        list($effect, $effectSecond) = $this->UserStageEffect->changeProbList($this->userId, $list);

        $effectText = '';
        $dateStr = '';
        if (!empty($effect)) {
            $effectText = $this->effectStr[$effect];
            // 期限
            $endTime = time() + $effectSecond;
            $dateStr = date("F d,Y H:i:s" , $endTime);
        }

        // 獲得最大経験値
        $maxExp = $data['use_act'];
        // 獲得経験値抑制
        $maxExp = $this->Common->expMinus($maxExp, $userParam['level']);

        // ボスフラグ
        $boss = 0;
        if (2 == $data['state']) $boss = 1;

        $act = (100 / $userParam['act_max']) * $userParam['act'];

        $ownerInfo = '';
        if (!empty($this->ownerInfo)) {
            $ownerInfo = '?' . $this->ownerInfo;
        }

        $this->set('ownerInfo', $ownerInfo);
        $this->set('data', $data);
        $this->set('userParam', $userParam);
        $this->set('param', $params);
        $this->set('prog', $data['progress']);
        $this->set('act', $act);
        $this->set('exp', $userParam['exp']);
        $this->set('notAct', $notAct);
        $this->set('boss', $boss);
        $this->set('effectText', $effectText);
        $this->set('dateStr', $dateStr);
        $this->set('maxExp', $maxExp);
    }

    /**
     * ボス戦前
     *
     * @author imanishi
     * @return void
     */
    public function conf() {

        $stageId = $this->params['stage_id'];

        $noCard = 0;
        // デッキにカードが１枚もない
        if (!empty($this->params['nocard'])) $noCard = 1;

        $userStageData = $this->UserStage->getUserStage($this->userId, $stageId);
        $enemyData = $this->Enemy->getEnemyData($userStageData['enemy_id']);
        $this->set('data', $enemyData);
        $this->set('noCard', $noCard);
        $this->set('stageId', $stageId);

    }

    /**
     * ボス戦実行
     *
     * @author imanishi
     * @return void
     */
    public function act() {

        $targetId = $this->params['target_id'];
        $stageId  = $this->params['stage_id'];

        $userStage = $this->UserStage->getUserStageByEnemyId($this->userId, $targetId ,$state = 2);
        // ブラウザバックなど不正操作
        if (empty($userStage) || 2 != $userStage['UserStage']['state']) {
             $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        // 防御側のデッキ取得
        $target = $this->Enemy->getEnemyData($targetId);
        $targetCards[]['UserCard'] = $target;

        if (empty($targetCards[0]['UserCard'])) {
             $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }

        // 攻撃側のデッキ取得
        $userCards = $this->UserDeck->getUserDeckData($this->userId);

        if (empty($userCards['UserDeckCard'])) {
             $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }

        $userCards = $userCards['UserDeckCard'];

        foreach ($userCards as $key => $val) {
            if (empty($val['UserCard'])) unset($userCards[$key]); 
        }

        // デッキにカードがない
        if (empty($userCards)) {
             $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
             $this->rd('Stages', 'conf', array('nocard' => 1, 'stage_id'=> $stageId));
        }

        $battleLog = array();

        // 敵HP最大
        $battleLog['enemy_max']   = $target['hp'];
        // 敵HP初期値
        $battleLog['enemy_cur']   = $target['hp'];

        // カード１
        $battleLog['card_id_1']   = isset($userCards[0]['UserCard']['card_id']) ? $userCards[0]['UserCard']['card_id']:0;
        // カード１HP最大
        $battleLog['card_id_1_max']   = isset($userCards[0]['UserCard']['hp_max']) ? $userCards[0]['UserCard']['hp_max']:0;
        // カード１HP初期値
        $battleLog['card_id_1_cur']   = isset($userCards[0]['UserCard']['hp']) ? $userCards[0]['UserCard']['hp']: 0;
        // カード2
        $battleLog['card_id_2']   = isset($userCards[1]['UserCard']['card_id']) ? $userCards[1]['UserCard']['card_id']:0;
        // カード2HP最大
        $battleLog['card_id_2_max']   = isset($userCards[1]['UserCard']['hp_max']) ? $userCards[1]['UserCard']['hp_max']:0;
        // カード2HP初期値
        $battleLog['card_id_2_cur']   = isset($userCards[1]['UserCard']['hp']) ? $userCards[1]['UserCard']['hp']: 0;
        // カード3
        $battleLog['card_id_3']   = isset($userCards[2]['UserCard']['card_id']) ? $userCards[2]['UserCard']['card_id']:0;
        // カード3HP最大
        $battleLog['card_id_3_max']   = isset($userCards[2]['UserCard']['hp_max']) ? $userCards[2]['UserCard']['hp_max']:0;
        // カード3HP初期値
        $battleLog['card_id_3_cur']   = isset($userCards[2]['UserCard']['hp']) ? $userCards[2]['UserCard']['hp']: 0;
        // カード4
        $battleLog['card_id_4']   = isset($userCards[3]['UserCard']['card_id']) ? $userCards[3]['UserCard']['card_id']:0;
        // カード4HP最大
        $battleLog['card_id_4_max']   = isset($userCards[3]['UserCard']['hp_max']) ? $userCards[3]['UserCard']['hp_max']:0;
        // カード4HP初期値
        $battleLog['card_id_4_cur']   = isset($userCards[3]['UserCard']['hp']) ? $userCards[3]['UserCard']['hp']: 0;
        // カード5
        $battleLog['card_id_5']   = isset($userCards[4]['UserCard']['card_id']) ? $userCards[4]['UserCard']['card_id']:0;
        // カード5HP最大
        $battleLog['card_id_5_max']   = isset($userCards[4]['UserCard']['hp_max']) ? $userCards[4]['UserCard']['hp']: 0;
        // カード5HP初期値
        $battleLog['card_id_5_cur']   = isset($userCards[4]['UserCard']['hp']) ? $userCards[4]['UserCard']['hp']: 0;

        // 攻撃側のスキル発動
        $battleLog['player_skill'] = array();
        foreach ($userCards as $key => $val) {
            $userCard = $val['UserCard'];
            if (!empty($userCard['skill_level'])) {
                mt_srand();
                $hit = mt_rand(1, 100);
                // 当選
                if ($hit <= $userCard['skill_level']) {
                    // カードのスキル取得 
                    $skillData = $this->Card->getCardData($userCard['card_id']);

                    $battleLog['skill']['atk'][] = $skillData;

                    // スキル実行
                    $this->Battle->doSkill($skillData, $key, $userCards, $targetCards, $battleLog['player_skill']);
                } else {
                    $battleLog['player_skill'][$key] = null;
                }
            }
        }

        // 防御側(敵)のスキル発動
        $battleLog['enemy_skill'] = array();
        foreach ($targetCards as $key => $val) {
            $selfCard = $val['UserCard'];
            if (!empty($selfCard['skill_level'])) {
                mt_srand();
                $hit = mt_rand(1, 100);
                // 当選
                if ($hit <= $selfCard['skill_level']) {
                    // カードのスキル取得 
                    $where = array(
                                 'skill_id' => $selfCard['skill_id']
                             );
                    $skillData = $this->Skill->getAllFind($where, array(), 'first');

                    $battleLog['skill']['def'][] = $skillData;

                    // スキル実行
                    $this->Battle->doSkill($skillData, $key, $targetCards, $userCards, $battleLog['enemy_skill'], $kind = 'enemy');
                } else {
                    $battleLog['enemy_skill'][$key] = null;
                }
            }
        }
        // 1:攻撃側勝利 2:防御側勝利
        $winner = 1;
        $count = 0;
        while(true) {
            
            $targetCards = $this->Battle->doBattleEnemy($userCards, $targetCards, $kind = 1, $battleLog[$count]);
            if (empty($targetCards)) break;
            $count++;

            $userCards = $this->Battle->doBattleEnemy($targetCards, $userCards, $kind = 2, $battleLog[$count]);
            if (empty($userCards)) {
                $winner = 2;
                break;
            }
            $count++;
        }

        // 勝者1:プレイヤー 2:敵
        $battleLog['winner'] = $winner;

        // 要した攻撃回数（ターン数ではない）
        $battleLog['count']   = $count;

        $battleLog = json_encode($battleLog);


        // バトルログ登録
        $this->BattleLog->begin(); 
        try {  

            $values[] = array($this->userId , $targetId, $winner, $battleLog);
            $this->BattleLog->registBattleLog($values);

            // 勝利の場合ステータス変更
            if ($winner == 1) {
                $where = array('enemy_id' => $targetId);
                $field = array('stage_id');
                $data = $this->Stage->getAllFind($where, $field, 'first');

                $value = array('state' => 3);
                $where = array(
                            'user_id' => $this->userId
                        ,   'UserStage.stage_id' => $data['stage_id']
                        );
                $this->UserStage->updateAll($value, $where);

                // 現在到達最大ステージ
                $stageId = $this->UserStage->getUserMaxStageId($this->userId);

                // 次のステージ
                $nextStageId = $stageId + 1;

                if ($nextStageId <= MAX_STAGE_ID) {

                    $field = array('state');
                    $where = array(
                                 'user_id'  => $this->userId
                             ,   'stage_id' => $stageId
                             );
                    $maxStage = $this->UserStage->getAllFind($where, $field, 'first');

                    if ( 3 == $maxStage['state'] ) {
                        // 次のステージへ
                        $fields = array('user_id', 'stage_id', 'progress', 'state');
                        $values = array();
                        $values[] = array($this->userId, $nextStageId, 0, 1);
                        $this->UserStage->insertBulk($fields, $values, $ignore = 1);
                    }
                }

            }

        } catch (AppException $e) { 
            $this->BattleLog->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->BattleLog->commit(); 

        $this->rd('Stages', 'product');
    }

    /**
     * ボス戦演出
     *
     * @author imanishi
     * @return void
     */
    public function product() {

        // 共通レイアウトは使わない
        $this->layout = '';

        $data = $this->BattleLog->getBattleLogDataLatest($this->userId);
        $data['log'] = json_decode($data['log'], true);
        $enemy = $this->Enemy->getEnemyData($data['target']);

        // 演出用ターン配列生成
        $turn = array();
        $player   = array();
        $deckKeys = array();
        $i = 0;
        $cardNo = 1;
        foreach ($data['log'] as $key => $value) {
            if ( $key === 'card_id_' . $cardNo ) {
                if (!empty($value)) {
                    $player[] = array(
                                   'img'     => IMG_URL . 'card/card_s_' . $value . '.jpg'
                               ,   'max'     => $data['log']['card_id_'. $cardNo . '_max'] 
                               ,   'current' => $data['log']['card_id_' . $cardNo . '_cur'] 
                               );
                } else {
                    $player[] = array(
                                   'img'     => IMG_URL . 'touka_card.png'
                               ,   'max'     => $data['log']['card_id_'. $cardNo . '_max'] 
                               ,   'current' => $data['log']['card_id_' . $cardNo . '_cur'] 
                               );

                }
                $cardNo++;
            }


            if (is_numeric($key)) {

                $hp = array();
                $val = array();
                for ($j = 0; $j < 5 ; $j++) {
                    if (isset($value[$j])) {
                        $hp[$j] = $value[$j]['targetData']['hp'] - $value[$j]['damage'];
                        $val = $value[$j];
                    } else {
                        if ( !isset($val['targetData']['enemy_id']) ) {
                            $hp[$j] = 0;
                        }
                    }
                    if (isset($hp[$j])) {
                        if ($hp[$j] < 0) $hp[$j] = 0;
                    }
                }


                if ( isset($val['targetData']['enemy_id']) ) {

                    $end  = 0;
                    $tmp = 0;
                    for ($k = 4; $end <= $k ; $k--) {
                        if (!isset($hp[$k]))  {
                            $hp[$k] = $tmp; 
                            continue;
                        }

                        if ($hp[$k] <= 0 && !empty($tmp)) {
                            $hp[$k] = $tmp;
                        }
                        $tmp = $hp[$k];
                    }

                    ksort($hp);

                    $cnt = count($hp);
                    $num = $lastKey = $cnt - 1;
                    if (!empty($hp[$lastKey])) {
                        while ($num < 4) {
                            $num++;
                            $hp[$num] = $hp[$lastKey];
                        }
                    }

                    // プレイヤーの攻撃
                    $turn[$i]['enemyHP'] = $hp;
                } else {
                    // 敵の攻撃
                    $turn[$i]['playerHP'] = $hp;
                    $i++;
                }
            }
        }


        // プレイヤースキル
        $playerSkillData = array();
        if (!empty($data['log']['player_skill'])) {
            $pSkill = array();
            for ($i = 0; $i < 5; $i++) {
                if (!isset($data['log']['player_skill'][$i])) {
                    $pSkill[$i] = "";
                } else {
                    $pSkill[$i] = $data['log']['player_skill'][$i];
                }
            }
            $playerSkillData = json_encode($pSkill);
        }

        $enemySkillData = array();
        if (!empty($data['log']['enemy_skill'])) 
            $enemySkillData = json_encode($data['log']['enemy_skill'][0]);

        $turn     = json_encode($turn);
        $player   = json_encode($player);

        // Js内で画面横幅変更用
        $divNum = 1;
        if (CARRER_IPHONE == $this->carrer) $divNum = 2;
        $this->set('divNum', $divNum); 
        $this->set('data', $data);
        $this->set('player', $player);
        $this->set('enemy', $enemy);
        $this->set('turn', $turn);
        $this->set('playerSkillData', $playerSkillData);
        $this->set('enemySkillData' , $enemySkillData);
    }

    /**
     * ボス戦後Hシーン
     *
     * @author imanishi
     * @return void
     */
    public function scene() {

        // 共通レイアウトは使わない
        $this->layout = '';

        if (empty($this->params['enemy_id'])) {
            $log = $this->BattleLog->getBattleLogDataLatest($this->userId);
            $data = $this->Enemy->getEnemyData($log['target']);
            $enemyId = $data['enemy_id'];
            $next = 'Stages/comp';
        } else {
            $page = isset($this->params[KEY_PAGING]) ? $this->params[KEY_PAGING] : 0;
            $enemyId = $this->params['enemy_id'];
            $data = $this->Enemy->getEnemyData($enemyId);
            $next = 'UserStages/index?' . KEY_PAGING . '='. $page;
            if ('waku' == PLATFORM_ENV) {
                $next = urlencode($next);
            }
        }
        $stage = $this->UserStage->getUserStageByEnemyId($this->userId, $enemyId, $state = 3);
        if (empty($stage)) {
             $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        $this->set('data', $data);
        $this->set('next', $next);
        $this->set('questId', $stage['Stage']['quest_id']);
    }

    /**
     * ボス戦後
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $log = $this->BattleLog->getBattleLogDataLatest($this->userId);

        $nextStageId = $this->UserStage->getUserMaxStageId($this->userId);

        // 勝利ではない
        if (1 != $log['result'])  {
            $where = array('enemy_id' => $log['target']);
            $field = array('stage_id');
            $data = $this->Stage->getAllFind($where, $field, 'first');

            $param = array(
                         'stage_id' => $data['stage_id']
                     );
            $this->rd('Stages', 'main' , $param);
        }
        // 処理済
        if ("0000-00-00 00:00:00" != $log['modified']) {
            $param = array(
                         'stage_id' => $nextStageId
                     );
            $this->rd('Stages', 'main' , $param);
        }


        $this->UserStage->begin(); 
        try {  

            $values = array(
                          'id' => $log['id']
                      );
            $this->BattleLog->save($values);
        
        } catch (AppException $e) { 
            $this->UserStage->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->UserStage->commit(); 

        $ending = $this->Enemy->judgeEnding($log['target']);
        if (!$ending) {
            // エピローグではない場合は次のステージへ
            $param = array(
                         'stage_id' => $nextStageId
                     );
            $this->rd('Stages', 'main' , $param);
        } else {
            // エピローグ
            $this->rd('Stages', 'end');
        }

    }

    /**
     * エピローグ
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        $log = $this->BattleLog->getBattleLogDataLatest($this->userId);

        // エピローグ
        $where = array('enemy_id' => $log['target']);
        $field = array();
        $data  = $this->Stage->getAllFind($where, $field, 'first');

        $this->set('data', $data);
    }

    /**
     * 登録更新
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:ajax以外のリクエスト
     */
	public function init() {

        if ('waku' == PLATFORM_ENV || $this->request->is(array('ajax'))) {
            $userId = $this->userId;

            // 進行度の基本
            $baseInt = self::STAGE_PROG_NORMAL;

            // 取得対象のデータ
            $targetData = array(
                'name' => "" 
            ,   'id'   => 0
            );
            $data = $this->params['params'];
            $data = (array)json_decode($data);
            $data['user_id'] = $userId;

            // 現在のユーザステージ情報取得
            $userStageData = $this->UserStage->getUserStage($userId, $data['stage_id']);
            $data['progress'] = $userStageData['progress'];

            // ユーザステータス取得
            $userParam = $this->userParam;

            // 行動力チェック
            if ($userParam['act'] < $userStageData['use_act']) {

                // 不足の場合は不正
                $ary = array(
                    'result' => 2
                ,   'stage_id' => $data['stage_id']
                );
                $this->setJson($ary);
                return false;
            }

            // 何かもらえるかどうか
            $lotData['kind']   = 0;
            $lotData['target'] = 0;
            $lotData['num']    = 0;
            mt_srand();
            $hit = mt_rand(1, 100);


            $effect = 0;
            $effectSecond = 0;

            // 確率変動アイテムの効果有無
            list($effect, $effectSecond) = $this->UserStageEffect->changeProbList($this->userId);

            // 確変中は出現率もアップ
            if ( 0 < $effect ) $userStageData['prob_get'] += QUEST_ITEM_EFFECT;

            if ($hit <= $userStageData['prob_get']) {
                // 抽選設定値取得
                $list = $this->StageProb->getStageProb($data['stage_id']);

                // 確率変動アイテムによる効果
                list($effect, $effectSecond) = $this->UserStageEffect->changeProbList($this->userId, $list);

                // 抽選
                $lotData = $this->Common->doLot($list);
            }

            // カード所有最大フラグ初期化
            $hasMaxFlg = 0;

            $this->UserStage->begin(); 
            try {
                // 入手カード振込など
                switch($lotData['kind'])
                {
                    // カード
                    case KIND_CARD:
                        // カード所持数確認
                        $hasMaxFlg = $this->UserCard->judgeMaxCardCnt($this->userId);

                        $row = array();
                        if (empty($hasMaxFlg)) {
                            // カード所持に余裕がある場合は直接
                            $this->UserCard->registCard($userId, $lotData['target'], $lotData['num'], $row);

                            // コレクション登録
                            $this->UserCollect->initCollect($this->userId, $row['card_id']);
                        } else {
                            // カード所持に余裕がない場合は受取ボックスへ
                            $regist[] = array(
                                $this->userId
                            ,   KIND_CARD
                            ,   $lotData['target']
                            ,   1
                            ,   'ミッション内で取得' 
                            );
                            $this->UserPresentBox->registPBox($regist);

                            $row = $this->Card->getCardData($lotData['target']);
                        }
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
                    // 当選無しはデッキカードのメッセージ
                    default:
                        $deckList = $this->UserDeck->getUserDeckData($this->userId);
                        $list = $deckList['UserDeckCard'];
                        foreach ($list as $key => $val) {
                            if (empty($val['UserCard'])) unset($list[$key]);
                        }

                        if (!empty($list)) {
                            shuffle($list);

                            $row = $list[0];

                            $cardData = $this->Card->getCardData($row['UserCard']['card_id']);
                            $targetData['name'] = $cardData['card_mes'];
                            $lotData['target']  = $row['UserCard']['card_id'];
                        } else {
                            $targetData['name'] = DECK_NOCARD;
                            $lotData['target']  = 1003;
                        }
                        
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
                        ,   'modified' => NOW_DATE_DB
                        );
                        $where = array(
                            'user_id' => $this->userId 
                        ,   'UserStage.stage_id' => $data['stage_id']     
                        );
                        $this->UserStage->updateAll($value, $where);

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

                // 行動時間を記録
                $values = array(
                    'user_id' => $this->userId 
                );
                $this->UserLastActTime->save($values);

                // 経験値アップ
                $levelUp = 0;
                $expBaseInt = $userStageData['use_act'];

                // 一回のクエスト実行で獲得経験値最大
                mt_srand();
                $getExp = mt_rand(1, $expBaseInt);
                // 獲得経験値抑制
                $getExp = $this->Common->expMinus($getExp, $userParam['level']);
                $userParam['exp'] += $getExp;

                // レベルアップ
                $actMaxDiff  = 0;
                $costAtkDiff = 0;
                $actMaxBef  = $userParam['act_max'];
                $costAtkBef = $userParam['cost_atk'];
                if (100 < $userParam['exp']) {
                    $userParam['exp'] = 0;
                    $userParam['level']++;
                    $levelUp = 1;

                    // レベルアップ処理
                    $userParam['act_max'] = ceil($userParam['act_max'] * 1.05);
                    $userParam['cost_atk'] += 1;
                    $actMaxDiff  = $userParam['act_max'] - $actMaxBef;
                    $costAtkDiff = $userParam['cost_atk'] - $costAtkBef;

                    // 行動力全回復
                    $userParam['act'] = $userParam['act_max']; 
                }
                $this->UserParam->setUserParams($userId, $userParam);

                // 行動力グラフ用に変更 
                $actBar = ($userParam['act'] / $userParam['act_max']) * 100;

                // 返却データを配列に格納
                $ary = array(
                    'result'           => 1
                ,   'progress'         => $data['progress']         // クエスト進行度 
                ,   'kind'             => $lotData['kind']          // 取得対象の種別（1.カード 3.お金）
                ,   'target'           => $lotData['target']        // 取得対象のid
                ,   'num'              => $lotData['num']           // 取得対象の個数（金額）
                ,   'exp'              => $userParam['exp']         // 経験値
                ,   'act'              => $actBar                   // 行動力 
                ,   'act_max_diff'     => $actMaxDiff               // 前のレベルとの差分
                ,   'cost_atk_diff'    => $costAtkDiff              // 前のレベルとの差分
                ,   'not_act'          => $notAct                   // 行動力切れの場合1
                ,   'level'            => $userParam['level']       // レベル
                ,   'level_up'         => $levelUp                  // レベルアップの場合1
                ,   'level_up_act_bf'  => $actMaxBef                // レベルアップ前の最大行動力
                ,   'level_up_act_af'  => $userParam['act_max']     // レベルアップ後の最大行動力
                ,   'level_up_cost_bf' => $costAtkBef               // レベルアップ前のデッキコスト
                ,   'level_up_cost_af' => $userParam['cost_atk']    // レベルアップ後のデッキコスト
                ,   'stage_clear'      => $stageClear               // ステージクリアの場合1 
                ,   'stage_id'         => $data['stage_id']         // ステージID
                ,   'name'             => $targetData['name']       // 入手物の名前
                ,   'effect'           => $effect                   // アイテム効果による確率変動(3:カードup 4:ゴールドup)
                ,   'effectSecond'     => $effectSecond             // アイテム効果残り秒
                ,   'has_max_flg'      => $hasMaxFlg                // カード所持最大フラグ
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
