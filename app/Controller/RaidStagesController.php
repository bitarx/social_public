<?php
App::uses('ApiController', 'Controller');
/**
 * RaidStages Controller
 *
 * @property RaidStage $RaidStage
 * @property PaginatorComponent $Paginator
 */
class RaidStagesController extends ApiController {

    // 最大ターン数
    public static $maxTurnNum = 2;

    // 特別報酬取得確率(%)
    public static $specialPresnt = 15;

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Battle');

    public $uses = array('RaidUserStage', 'Enemy', 'UserDeck', 'RaidStage', 'RaidUserCurStage', 'UserParam', 'RaidStageProb', 'UserCard', 'RaidBattleLog', 'Card', 'UserLastActTime', 'RaidQuest', 'UserStageEffect', 'Skill', 'UserCollect', 'UserPresentBox', 'RaidMaster', 'RaidDamage', 'RaidUserCurEnemy', 'RaidEnemyAliveTime', 'RaidUserEnemyCnt', 'RaidPresentLog', 'RaidPresent', 'RaidHelp', 'UserLastBpTime', 'UserBaseCard', 'EvRaidPresent');

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

        $list = $this->RaidStage->getList($questId);
        if (empty($list)) {
            $this->log('RaidStage Access Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }
    
        $pList = array();
        $i = 0;
        foreach ($list as &$val) {
            $where = array(
                'raid_stage_id' => $val['raid_stage_id']
            ,   'kind' => KIND_ENEMY
            );
            $field = array('target');
            $enemyIds = $this->RaidStageProb->getAllFind($where, $field);
            if (!empty($enemyIds)) {
                foreach ($enemyIds as $enemyId) {
                    $pList[$i] = $this->RaidPresent->getList($enemyId);
                    $pList[$i]['enemy'] = $this->Enemy->getEnemyData($enemyId);
                    arsort($pList[$i]);
                    $i++;
                }
            }
        }

        $this->set('list', $list);
        $this->set('pList', $pList);
        $this->set('questId', $questId);
        $this->set('guideId', 1 );
        $this->set('subTitle', '報酬一覧（討伐時一定の確率で獲得）' );
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

        // 現在到達確認
        $where = array(
            'user_id'        => $this->userId
        ,   'RaidUserStage.raid_stage_id'  => $stageId 
        );
        $stage = $this->RaidUserStage->field('raid_stage_id', $where);

        $this->RaidUserCurStage->begin(); 
        try {
            if (empty($stage)) {
                $values = array(
                    'user_id'  => $this->userId  
                ,   'raid_stage_id' => $stageId
                ,   'progress' => 0
                ,   'state'    => 1
                );
                $this->RaidUserStage->save($values);    
            }

            $values = array(
                'user_id' => $this->userId  
            ,   'raid_stage_id' => $stageId
            );
            $this->RaidUserCurStage->save($values);    
        } catch (AppException $e) { 
            $this->UserCurRaidStage->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->RaidUserCurStage->commit(); 

        $params = array('stage_id' => $stageId);
        $this->rd('RaidStages', 'main', $params);
    }

    /**
     * クエスト実行
     *
     * @author imanishi
     * @return void
     */
    public function main() {

        $stageId = $this->params['stage_id'];

        $helpKind = !empty($this->params['kind']) ? $this->params['kind'] : 0;
        $helpWord = '';
        if (!empty($helpKind)) {
            $word = $this->Common->helpKindWord($helpKind);
        }
        if (!empty($word)) {
            $helpWord = '<span style="color:#FFA500">' . $word . '</span>に救援依頼を送りました！';
        }

        $data = $this->RaidUserStage->getUserStage($this->userId, $stageId, $recu = 2);

        // 到達していない
        if (!isset($data['progress'])) {
            $this->log('RaidStage Access Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        // 敵出現状態であれば敵画面へ
        $where = array(
            'RaidUserCurEnemy.user_id' => $this->userId
        ,   'RaidUserCurEnemy.raid_stage_id' => $stageId
        );
        $field = array('raid_master_id');
        $ret = $this->RaidUserCurEnemy->getAllFind($where, $field, 'first');
        if (!empty($ret)) {
            $rd = 1;
            if (!empty($ret['raid_master_id'])) {
                $where = array(
                    'RaidMaster.raid_master_id' => $ret['raid_master_id']
                ,   'RaidMaster.end_time > '    => $this->Common->nowDate() 
                );
                $res = $this->RaidMaster->field('raid_master_id', $where);
                if (empty($res)) {
                    $rd = 0;

                    // 時間切れの為敵出現状態削除
                    $this->RaidUserCurEnemy->begin();
                    $where = array(
                        'RaidUserCurEnemy.user_id' => $this->userId
                    ,   'RaidUserCurEnemy.raid_stage_id' => $stageId 
                    );
                    if(!$this->RaidUserCurEnemy->deleteAll($where)){
                         $this->log( __FILE__ .  ':' . __LINE__ .' : Raid CurEnemy Delete Error :userId:' . $this->userId );
                         $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
                    }
                    $this->RaidUserCurEnemy->commit();

                }
            }

            if (!empty($rd)) {
                $this->rd('RaidStages', 'conf', array('stage_id'=> $stageId )); 
            }
        }

        $userParam = $this->UserParam->getUserParams($this->userId);

        $params = array(
            'raid_stage_id' => $stageId
        ,   'raid_quest_id' => $data['raid_quest_id']
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
        $this->set('helpWord', $helpWord);
        $this->set('stageId', $stageId);
    }

    /**
     * ボス再戦
     *
     * @author imanishi
     * @return void
     */
    public function again() {

        if (empty($this->params['stage_id']) || empty($this->params['raid_master_id'])) {
            $this->log('Raid Again param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        $stageId = $this->params['stage_id'];
        $raidMasterId = $this->params['raid_master_id'];

        $where = array(
            'RaidMaster.raid_master_id' => $raidMasterId 
        );
        $field = array('enemy_id', 'level');
        $data = $this->RaidMaster->getAllFind($where, $field, 'first');
        if (empty($data)) {
            $this->log('Raid Again param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        $where = array(
             'RaidUserCurEnemy.user_id'       => $this->userId
        ,    'RaidUserCurEnemy.raid_stage_id' => $stageId
        );
        $ret = $this->RaidUserCurEnemy->field('user_id' , $where);

        $values = array();

        $this->RaidUserCurEnemy->begin(); 
        try {

            if (empty($ret)) {
                $field = array('user_id', 'raid_stage_id', 'enemy_id', 'level', 'raid_master_id');
                $values[] = array($this->userId, $stageId, $data['enemy_id'], $data['level'], $raidMasterId);
                $this->RaidUserCurEnemy->insertBulk($field, $values, $ignore=1);
            } else {
                $values = array(
                    'user_id'        => $this->userId
                ,   'raid_stage_id'  => $stageId
                ,   'enemy_id'       => $data['enemy_id']
                ,   'level'          => $data['level']
                ,   'raid_master_id' => $raidMasterId 
                );
                $this->RaidUserCurEnemy->updateAll($values, $where);
            }
        } catch (AppException $e) { 
            $this->RaidUserCurEnemy->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->RaidUserCurEnemy->commit(); 

        $this->rd('RaidStages', 'conf', array('stage_id'=> $stageId )); 
    }

    /**
     * ボス戦前
     *
     * @author imanishi
     * @return void
     */
    public function conf() {

        $stageId = isset($this->params['stage_id']) ? $this->params['stage_id'] : 0;
        $raidMasterId = isset($this->params['raid_master_id']) ? $this->params['raid_master_id'] : 0;

        // デッキカード確認
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
        $noCard = 0;
        if (empty($userCards)) {
             $noCard = 1;
        }

        // BP不足
        $errWord = "";
        if (!empty($this->params['bpless'])) {
            $errWord = 'BPが不足しています';
        }

        $help ="";

        if (!empty($stageId)) {

            // 発見者
            $where = array(
                'RaidUserCurEnemy.user_id' => $this->userId
            ,   'RaidUserCurEnemy.raid_stage_id' => $stageId 
            );
            $field = array('RaidUserCurEnemy.enemy_id', 'RaidUserCurEnemy.level', 'RaidUserCurEnemy.raid_master_id');
            $data = $this->RaidUserCurEnemy->getAllFind($where, $field, 'first');
            $enemyId = $data['enemy_id'];
            $level = $data['level'];
            $raidMasterId = $data['raid_master_id'];

            $data = $this->RaidMaster->getData($raidMasterId);
        } elseif (!empty($raidMasterId)) {

            // 参加者
            $data = $this->RaidMaster->getData($raidMasterId);
            $helpData = $this->RaidHelp->getDataByRaidMasterId($this->userId, $raidMasterId);
            if ($data['user_id'] != $helpData['user_id']) {
                // 不正
                $this->log('Raid help param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
            }

            $enemyId = $data['enemy_id'];
            $stageId = $data['raid_stage_id'];
            $level   = $data['level'];

            $help = '&raid_help_id=' . $helpData['raid_help_id'];

        } else {
            $this->log('Raid conf param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        $enemyData = $this->Enemy->getEnemyData($enemyId);
        if (!empty($data)) {
            // 再戦
            $lowHp = floor($data['hp_max'] / 10);
            if ($data['hp'] < $lowHp) {
                $under = 1;
            }
            $hpNow = $data['hp'];
        } else {
            // 初戦
            if (1 < $level) {
                $multi = $level / 100; 
                $multi += 1;
            } else {
                $multi = 1;
            }

            $hpNow = $enemyData['hp'] * $multi;
            $data['hp_max'] = $hpNow;
            $data['end_time'] = '';
        }

        if (isset($under)) {
            $hpNow = '<span style="color:#FF0000">' . $hpNow . '</span>';
        } else {
            $hpNow = '<span style="color:#008000">' . $hpNow . '</span>';
        }

        // イベント期間台詞変更
        if (!empty($this->raidEvent)) {

            if (!empty($enemyData['after_win_words'])) {
                $enemyData['before_words'] = $enemyData['after_win_words'];
            }
        }

        // 敵HP
        $enemyHp = '<span style="color:#FFA500">HP</span> : ' . $hpNow . '  /  ' . $data['hp_max'];
        $enemyData['card_name'] .= 'Lv' . $level;
        $this->set('data', $enemyData);
        $this->set('errWord', $errWord);
        $this->set('noCard', $noCard);
        $this->set('stageId', $stageId);
        $this->set('help', $help);
        $this->set('enemyHp', $enemyHp);
        $this->set('dateStr', str_replace('-', '/', $data['end_time']));

    }

    /**
     * ボス戦実行
     *
     * @author imanishi
     * @return void
     */
    public function act() {

        if (empty($this->params['stage_id']) || empty($this->params['at'])) {
             $this->log( __FILE__ .  ':' . __LINE__ .': raid act Param Error : userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        $stageId  = $this->params['stage_id'];
        $attack  = $this->params['at'];

        // 不正
        if (!($attack == 1 || $attack == 2 || $attack == 6)) {
             $this->log( __FILE__ .  ':' . __LINE__ .' : attack Param Error : userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        $minus = $attack;
        if ( 6 == $attack ) {
            $minus = 5;
        }

        // バトルポイント不足
        $bpAfter = $this->userParam['bp'] - $minus;
        if ($bpAfter < 0) {
             $this->rd('RaidStages', 'conf', array('stage_id' => $stageId , 'bpless' => 1));
        }

        // 参戦者の場合
        $raidHelpId = 0;
        if (!empty($this->params['raid_help_id'])) {
            $raidHelpId = $this->params['raid_help_id'];
        }

        $raidMasterId = 0;

        // 参戦者か
        $helpFlg = 0;
        if (!empty($raidHelpId)) {
            $help = $this->RaidHelp->getDataWithMster($raidHelpId, $this->userId);
            // 時間切れ
            if (empty($help)) {
                 $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Param Error : userId:' . $this->userId );
                 $this->rd('RaidStages', 'main', array('stage_id' => $stageId , 'timeover' => 1));
            }
        }

        // 救援要請を受けて参戦
        if (!empty($help)) {
            // 敵マスタより情報取得
            $where = array(
                'RaidMaster.raid_master_id' => $help['raid_master_id']
            ,   'RaidMaster.user_id'        => $help['user_id']        // 発見者ID
            ,   'RaidMaster.end_time > '    => $this->Common->nowDate()
            );
            $field = array('raid_master_id', 'enemy_id', 'level');
            $row = $this->RaidMaster->getAllFind($where, $field, 'first');
            if (empty($row)) {
                 $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Param Error : userId:' . $this->userId );
                 $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
            }

            $helpFlg = 1;

        } else {
            // 出現状態の敵がいるか
            $where = array(
                'RaidUserCurEnemy.user_id' => $this->userId
            ,   'RaidUserCurEnemy.raid_stage_id' => $stageId
            );
            $field = array('enemy_id', 'level', 'raid_master_id');
            $row = $this->RaidUserCurEnemy->getAllFind($where, $field, 'first');
            if (empty($row)) {
                 $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Param Error : userId:' . $this->userId );
                 $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
            }
        }

        $targetId       = $row['enemy_id'];
        $enemyLevel     = $row['level'];

        // 初戦の場合は0
        $raidMasterId   = $row['raid_master_id'];



        // 防御側のデッキ取得
        $target = $this->Enemy->getEnemyData($targetId);

        if (!empty($raidMasterId)) {
            // 初戦でない場合は現在のHP取得
            $where = array(
                'raid_master_id' => $raidMasterId 
            ,   'end_time > '    => $this->Common->nowDate() 
            );
            $ret = $this->RaidMaster->field('hp', $where);
            if (empty($ret)) {
                 // 時間切れ
                 $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId );
                 $this->rd('RaidStages', 'raidList', array('stage_id' => $stageId ));
            }
            $target['hp'] = $ret;
        }


        // レベル１ではない場合はステータス補正
        if (1 < $enemyLevel) {
            $multi = $enemyLevel / 100; 
            $multi += 1;

            if (empty($raidMasterId)) {
                // 初戦の場合はHPも補正
                $target['hp'] *= $multi;
                $target['hp'] = floor($target['hp']);
            }
            $target['atk'] *= $multi;
            $target['atk'] = floor($target['atk']);
            $target['def'] *= $multi;
            $target['def'] = floor($target['def']);
        }
        
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
             $this->rd('RaidStages', 'conf', array('nocard' => 1, 'stage_id'=> $stageId));
        }

        // 攻撃力補正
        if (2 == $attack || 6 == $attack) {
            foreach ($userCards as $key => $val) {
                $userCards[$key]['UserCard']['atk'] *= $attack;
            }
        }

        $battleLog = array();

        // 敵HP最大
        $battleLog['enemy_max']   = $target['hp'];
        // 敵HP初期値
        $startEnemyHp = $battleLog['enemy_cur']   = $target['hp'];

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
                $winner = 3;
                break;
            }
            $count++;

            // レイドボス戦なのでターン制限
            if (self::$maxTurnNum < $count) {
                $winner = 2; 
                break;
            }
        }

        // 1:勝利 2:draw 3:敗北
        $battleLog['winner'] = $winner;

        // 要した攻撃回数（ターン数ではない）
        $battleLog['count']   = $count;

        // 与えたダメージを抽出
        $allDamage = 0;
        foreach ($battleLog as $key => $val) {
            if (is_numeric($key)) {
                foreach ($val as $v) {
                    if (isset($v['targetData']['enemy_id'])) {
                        $allDamage += $v['damage'];
                    }
                }
            }
        }
        $battleLog = json_encode($battleLog);

        // 敵生存時間を取得
        $where = array('enemy_id' => $targetId);
        $aliveTime = $this->RaidEnemyAliveTime->field('alive_time', $where);
        if (empty($aliveTime)) {
             $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Alive Data Error :userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
        }
        $addTimeSp = $this->Common->h2s($aliveTime);
        $endTimeSp = time() + $addTimeSp;
        $endTime = date("Y-m-d H:i:s", $endTimeSp);


        // バトルログ登録
        $this->RaidBattleLog->begin(); 
        try {  

            // BP減算
            $update = array(
                'user_id' => $this->userId
            ,   'bp'      => $bpAfter
            );
            $this->UserParam->save($update);


            $save = array(
                'user_id' => $this->userId
            );
            $this->UserLastBpTime->save($save);


            // 初戦
            if (empty($raidMasterId)) {
                // レイドマスタ登録
                $value = array(
                    'user_id'        => $this->userId 
                ,   'enemy_id'       => $targetId 
                ,   'level'          => $enemyLevel
                ,   'hp'             => $startEnemyHp 
                ,   'hp_max'         => $startEnemyHp 
                ,   'raid_stage_id'  => $stageId 
                ,   'end_time'       => $endTime
                );
                $this->RaidMaster->save($value);

                $raidMasterId = $this->RaidMaster->getLastInsertID();
                if (empty($raidMasterId)) {
                     $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Get Latest Id Error :userId:' . $this->userId );
                     $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
                }
            }

            $values[] = array($this->userId , $targetId, $raidMasterId, $winner, $battleLog);
            $this->RaidBattleLog->registBattleLog($values);

            // レイドダメージ登録
            $value = array(
                'user_id'  => $this->userId 
            ,   'raid_master_id' => $raidMasterId 
            ,   'damage' => $allDamage
            ,   'help_flg' => $helpFlg
            );
            $this->RaidDamage->save($value);

            // HP更新
            $afterHp = $startEnemyHp - $allDamage;
            if ($afterHp < 0) $afterHp = 0;
            $value = array(
                'raid_master_id'  => $raidMasterId
            ,   'hp'              => $afterHp 
            );
            $this->RaidMaster->save($value);

            // 敵出現状態削除
            $where = array(
                'RaidUserCurEnemy.user_id' => $this->userId
            ,   'RaidUserCurEnemy.raid_stage_id' => $stageId 
            );
            if(!$this->RaidUserCurEnemy->deleteAll($where)){
                 $this->log( __FILE__ .  ':' . __LINE__ .' : Raid CurEnemy Delete Error :userId:' . $this->userId );
                 $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
            }

            // 勝利の場合ステータス変更
            if ($winner == 1) {
                // 参加者リスト取得
                $userList = $this->RaidDamage->getAddDamageList($raidMasterId);

                // 最大HP取得
                $where = array(
                    'raid_master_id' => $raidMasterId
                );
                $hpMax = $this->RaidMaster->field('hp_max', $where);

                // 報酬ベース
                $moneyBase = $hpMax / 10;

                // 参加人数
                $userNum = count($userList);

                // 一人あたりのペニー
                $money = ceil($moneyBase / $userNum);
                
                // ペニー振込
                $mes =  $target['card_name']. 'Lv' . $enemyLevel . 'の討伐報酬';
                $values = array();
                $valuesLog = array();
                foreach ($userList as $val) {
                    $values[] = array($val['user_id'], KIND_GOLD, 0, $money, $mes);
                    $valuesLog[] = array($val['user_id'], $raidMasterId, KIND_GOLD, 0, $money);
                }

                // 一定の確率で特別プレゼント
                mt_srand();
                $int = mt_rand(1, 100);
                if ($int <= self::$specialPresnt){
                    $pList = $this->RaidPresent->getList($target['enemy_id']);
                    // 敵レベル補正
                    foreach ($pList as &$val) {
                        if (!empty($val['special_flg'])) {
                            if ($enemyLevel < 10) {
                                $multi = 0;
                            } else {
                                $multi = ceil($enemyLevel / 10);
                            }
                            $val['prob'] *= $multi;
                        }
                    }

                    $lotData = $this->Common->doLot($pList);

                    // 参加者全員にプレゼント
                    foreach ($userList as $val) {
                        $values[] = array($val['user_id'], $lotData['kind'], $lotData['target'], $lotData['num'], $mes);
                        $valuesLog[] = array($val['user_id'], $raidMasterId, $lotData['kind'], $lotData['target'], $lotData['num']);
                    }

                }

                // イベント期間処理
                if (!empty($this->raidEvent)) {
                    
                    $now  = $this->Common->nowDate();

                    $tarm = 1;
                    if ($now < $this->raidEvent['1st_end_time']) {
                        // 前半
                        $start = $this->raidEvent['start_time'];
                        $end   = $this->raidEvent['1st_end_time'];
                        $tmName = '前半';
                    } else {
                        // 後半
                        $start = $this->raidEvent['1st_end_time'];
                        $end   = $this->raidEvent['end_time'];
                        $tarm = 2;
                        $tmName = '後半';
                    }

                    // 対象がカードである
                    $where = array(
                        'ev_raid_id' => $this->raidEvent['ev_raid_id']
                    ,   'kind'       => KIND_CARD
                    );
                    $targetEnemyData = $this->EvRaidPresent->getAllFind($where, $field = array(), 'first');
                    if (!empty($targetEnemyData) && $targetId == $targetEnemyData['target']) {
                        // イベント期間内に対象敵を討伐したことがあるか
                        $ret = $this->RaidPresentLog->isTarget($this->userId, $targetEnemyData['target'], $start, $end); 
                        if (!$ret) {
                             
                            $mes = $this->raidEvent['title'] . $tmName . 'の参加報酬';
                            // 倒したことがなければ振込
                            foreach ($userList as $val) {
                                $values[] = array($val['user_id'], $targetEnemyData['kind'], $targetEnemyData['target'], $targetEnemyData['num'], $mes);
                                $valuesLog[] = array($val['user_id'], $raidMasterId, $targetEnemyData['kind'], $targetEnemyData['target'], $targetEnemyData['num']);
                            }
                            
                        }
                    }
                }

                $this->UserPresentBox->registPBox($values);
                $this->RaidPresentLog->regist($valuesLog);

                // 発見者の討伐数を記録
                $where = array('raid_master_id' => $raidMasterId);
                $findUserId = $this->RaidMaster->field('user_id', $where);

                $where = array(
                    'RaidMaster.user_id' => $findUserId 
                ,   'RaidMaster.enemy_id' => $target['enemy_id'] 
                );
                $field = array('raid_master_id');
                $rows = $this->RaidMaster->getAllFind($where, $field);
                if(empty($rows)){
                     $this->log( __FILE__ .  ':' . __LINE__ .' : Raid Master Count Error :userId:' . $this->userId );
                     $this->rd('errors', 'index', array('error' => ERROR_ID_SYSTEM ));
                }
                $cnt = count($rows);

                $where = array(
                    'RaidUserEnemyCnt.user_id' => $findUserId 
                ,   'RaidUserEnemyCnt.enemy_id' => $target['enemy_id'] 
                );
                $ret = $this->RaidUserEnemyCnt->field('user_id', $where);
                if (empty($ret)) {
                    $fields = array('user_id', 'enemy_id', 'cnt');
                    $values = array();
                    $values[] = array($findUserId, $target['enemy_id'], $cnt);
                    $this->RaidUserEnemyCnt->insertBulk($fields, $values);
                } else {
                    $value = array(
                        'cnt' => $cnt  
                    );
                    $this->RaidUserEnemyCnt->updateAll($value, $where);
                }
            }

        } catch (AppException $e) { 
            $this->RaidBattleLog->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->RaidBattleLog->commit(); 

        $this->rd('RaidStages', 'product');
    }

    /**
     * 逃げる
     *
     */
    public function runAway () {

        if (empty($this->params['stage_id'])) {
             $this->log( __FILE__ .  ':' . __LINE__ .' : Raid RunAway Param Error :userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }
        $stageId = $this->params['stage_id'];

        $bpAfter = $this->userParam['bp'] - 1;
        if ($bpAfter < 0) {
             $this->log( __FILE__ .  ':' . __LINE__ .' : Raid RunAway Param Error :userId:' . $this->userId );
             $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        try {  

            // BP減算
            $update = array(
                'user_id' => $this->userId
            ,   'bp'      => $bpAfter
            );
            $this->UserParam->save($update);


            $save = array(
                'user_id' => $this->userId
            );
            $this->UserLastBpTime->save($save);

            $where = array(
                'user_id' => $this->userId
            ,   'raid_stage_id' => $stageId
            );
            $this->RaidUserCurEnemy->deleteAll($where);

        } catch (AppException $e) { 
            $this->RaidBattleLog->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 

        $param = array(
            'stage_id' => $stageId
        );
        $this->rd('RaidStages', 'main', $param);
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

        $data = $this->RaidBattleLog->getBattleLogDataLatest($this->userId);
        $data['log'] = json_decode($data['log'], true);
        $enemy = $this->Enemy->getEnemyData($data['target']);

        $latest = $this->RaidDamage->getLatestData($this->userId);
        $enemy['card_name'] .= 'Lv' . $latest['level'];

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

        $where = array('user_id' => $this->userId);
        $stageId = $this->RaidUserCurStage->field('raid_stage_id', $where);

        // Js内で画面横幅変更用
        $divNum = 1;
        if (CARRER_IPHONE == $this->carrer) $divNum = 2;
        $this->set('divNum', $divNum); 
        $this->set('data', $data);
        $this->set('player', $player);
        $this->set('enemy', $enemy);
        $this->set('latest', $latest);
        $this->set('stageId', $stageId);
        $this->set('turn', $turn);
        $this->set('playerSkillData', $playerSkillData);
        $this->set('enemySkillData' , $enemySkillData);
    }

    /**
     * 交戦中一覧
     *
     * @author imanishi
     * @return void
     */
    public function raidList() {

        // 現在のステージ取得
        $where = array(
            'user_id' => $this->userId
        );
        $stageId = $this->RaidUserCurStage->field('raid_stage_id', $where);

        // 交戦中リスト取得
        $pageAll = 1;
        $list = $this->RaidDamage->getRaidList($this->userId, $limit = PAGE_LIMIT, $this->offset, $pageAll);

        foreach ($list as &$val) {
            $where = array('enemy_id' => $val['enemy_id']);
            $val['enemy_name'] = $this->Enemy->field('card_name', $where);
            $val['end_time'] = $this->Common->changeTimeStr($val['end_time']);
        }

        $this->set('list', $list);
        $this->set('pageAll', $pageAll);
        $this->set('stageId', $stageId);
        $this->set('title', '交戦中一覧');
        $this->set('guideId', 2);
        $this->set('mes', '交戦中のレイドボスはいません。');
    }

    /**
     * 救援要請一覧
     *
     * @author imanishi
     * @return void
     */
    public function helpList() {

        // 現在のステージ取得
        $where = array(
            'user_id' => $this->userId
        );
        $stageId = $this->RaidUserCurStage->field('raid_stage_id', $where);

        // レイドボス救援要請
        $pageAll = 1;
        $list = $this->RaidHelp->getHelpList($this->userId, $limit = PAGE_LIMIT, $this->offset, $pageAll);
        if (!empty($list)) {
            foreach ($list as &$val) {
                $val['end_time'] = $this->Common->changeTimeStr($val['end_time']);
            }
        }

        $this->set('list', $list);
        $this->set('pageAll', $pageAll);
        $this->set('stageId', $stageId);
        $this->set('title', '救援要請一覧');
        $this->set('guideId', 2);
        $this->set('mes', '救援要請はありません。');
    }

    /**
     * 救援してくれた人一覧
     *
     * @author imanishi
     * @return void
     */
    public function helpSelfList() {

        // 現在のステージ取得
        $where = array(
            'user_id' => $this->userId
        );
        $stageId = $this->RaidUserCurStage->field('raid_stage_id', $where);

        // レイドボス救援してくれた人
        $pageAll = 1;
        $list = $this->RaidDamage->getHelpSelfList($this->userId, $limit = PAGE_LIMIT, $this->offset, $pageAll);
        if (!empty($list)) {
            foreach ($list as &$val) {
                $val['created'] = $this->Common->changeTimeStr($val['created']);
                $val['user_name']    = $this->User->getUserName($val['user_id']);
                $val['enemy_name']   = $this->Enemy->getEnemyName($val['enemy_id']);
                $val['card_id']      = $this->UserBaseCard->getCardId($val['user_id']);
            }
        }

        $this->set('list', $list);
        $this->set('pageAll', $pageAll);
        $this->set('stageId', $stageId);
        $this->set('title', '救援してくれた人一覧');
        $this->set('guideId', 2);
        $this->set('mes', '救援してくれた人はいません。');
    }

    /**
     * 救援依頼を出す
     *
     * @author imanishi
     * @return void
     */
    public function helpOffer() {

        if (empty($this->params['kind']) || empty($this->params['raid_master_id'])) {
            $this->log('RaidStage Param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }
        $kind = $this->params['kind'];
        $raidMasterId = $this->params['raid_master_id'];

        // 値チェック
        $mstData = $this->RaidMaster->getData($raidMasterId);
        if ( empty($mstData) || $this->userId != $mstData['user_id'] ) {
            $this->log('RaidStage Param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        // 1:近いレベル 2:フレンド 3:グループ
        $list = array();
        switch ($kind) 
        {
            case 1:
                // 自分のレベル
                $level = $this->userParam['level'];
                $ret = $this->UserParam->getNearLevelList($this->userId, $level);

                $cnt = 0;
                if (!empty($ret)) {
                    shuffle($ret);
                    foreach ($ret as $val) {
                        $list[] = $val['user_id'];
                        $cnt++;
                        if (20 < $cnt) break;
                    }
                }
                break;
            case 2:
                break;
            case 2:
                break;
        }

        $noHelp = 0;
        if (!empty($list)) {

            $values = array();
            foreach ($list as $target) {
                $values[] = array($this->userId, $target, $raidMasterId, $kind);
            }

            $this->RaidHelp->begin();
            try { 

                $this->RaidHelp->regist($values);

            } catch (AppException $e) { 
                $this->RaidHelp->rollback(); 
                $this->log($e->errmes);
                return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
            $this->RaidHelp->commit();

        } else {
            $noHelp = 1;
        }

        $stageId = $this->RaidUserCurStage->getCurStageId($this->userId);

        $param = array(
            'stage_id' => $stageId
        ,   'kind'     => $kind 
        ,   'no_help'  => $noHelp 
        );
        $this->rd('RaidStages', 'main', $param); 
    }


    /**
     * バトル完了後
     *
     * @author imanishi
     * @return void
     */
    public function end() {

        $pList = array();

        $log = $this->RaidBattleLog->getBattleLogDataLatest($this->userId);
        $result = $log['result'];

        $latest = $this->RaidDamage->getLatestData($this->userId);

        // 勝利
        if (1 == $result) {
            $guideId = 2;
            $mes = '以下の討伐報酬が受取BOXに送られました！';
            // 報酬を取得
            $pList = $this->RaidPresentLog->getListByRaidMasterId($latest['raid_master_id'], $this->userId);
        } else {
            // 敗北、引き分け
            if (empty($latest['help_flg'])) {
                // 自分で発見
                $guideId = 3;
                $mes = '自分だけで倒せない場合は救援依頼を出されてはいかがでしょうか？';
            } else {
                // 救援要請一覧へ
                $this->rd('RaidStages', 'helpList');
            }
        }

        // 現在のステージ
        $stageId  = $this->RaidUserCurStage->getCurStageId($this->userId);
        $action = 'main';
        if (empty($stageId)) {
            $action = 'index';
        }

        $this->set('latest', $latest);
        $this->set('guideId', $guideId);
        $this->set('mes', $mes);
        $this->set('subTitle', '救援依頼を出す');
        $this->set('result', $result);
        $this->set('pList', $pList);
        $this->set('action', $action);
        $this->set('stageId', $stageId);
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
            $userRaidStageData = $this->RaidUserStage->getUserStage($userId, $data['raid_stage_id']);
            $data['progress'] = $userRaidStageData['progress'];

            // ユーザステータス取得
            $userParam = $this->userParam;

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
            if ( 0 < $effect ) $userRaidStageData['prob_get'] += QUEST_ITEM_EFFECT;
            if ($hit <= $userRaidStageData['prob_get']) {
                // 抽選設定値取得
                $list = $this->RaidStageProb->getStageProb($data['raid_stage_id']);

                // 確率変動アイテムによる効果
                list($effect, $effectSecond) = $this->UserStageEffect->changeProbList($this->userId, $list);

                // 抽選
                $lotData = $this->Common->doLot($list);
            }

            // カード所有最大フラグ初期化
            $hasMaxFlg = 0;
            $this->RaidUserStage->begin(); 
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
                        // 遭遇敵のレベルを決定
                        $enemyLevel = 1;
                        $where = array(
                            'RaidUserEnemyCnt.user_id'  => $this->userId
                        ,   'RaidUserEnemyCnt.enemy_id' => $lotData['target']
                        );
                        $cnt = $this->RaidUserEnemyCnt->field('cnt', $where);
                        if (!empty($cnt)) {
                            $enemyLevel = $cnt + 1;
                        }
                        // 遭遇敵を記録
                        $value = array(
                            'RaidUserCurEnemy.user_id'       => $this->userId 
                        ,   'RaidUserCurEnemy.raid_stage_id' => $data['raid_stage_id']
                        ,   'RaidUserCurEnemy.enemy_id'      => $lotData['target']
                        ,   'RaidUserCurEnemy.level'         => $enemyLevel
                        );

                        $fields = array('user_id', 'raid_stage_id', 'enemy_id', 'level');
                        $value = array();
                        $value[] = array($this->userId, $data['raid_stage_id'], $lotData['target'], $enemyLevel);
                        $this->RaidUserCurEnemy->insertBulk($fields, $value, $ignore = 1);
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
                $nextRaidStageId = $data['raid_stage_id'];

                // 返却データを配列に格納
                $ary = array(
                    'result'           => 1
                ,   'kind'             => $lotData['kind']          // 取得対象の種別（1.カード 3.お金）
                ,   'target'           => $lotData['target']        // 取得対象のid
                ,   'num'              => $lotData['num']           // 取得対象の個数（金額）
                ,   'exp'              => $userParam['exp']         // 経験値
                ,   'level'            => $userParam['level']       // レベル
                ,   'stage_id'         => $data['raid_stage_id']         // ステージID
                ,   'name'             => $targetData['name']       // 入手物の名前
                ,   'effect'           => $effect                   // アイテム効果による確率変動(3:カードup 4:ゴールドup)
                ,   'effectSecond'     => $effectSecond             // アイテム効果残り秒
                ,   'has_max_flg'      => $hasMaxFlg                // カード所持最大フラグ
                );
            } catch (AppException $e) { 
                $this->RaidUserStage->rollback(); 
                $this->log($e->errmes);
                $ary = array('result' => 2);
            } 
            $this->RaidUserStage->commit(); 

        } else {
            $ary = array('result' => 2);
        }
        $this->setJson($ary);
	}

}
