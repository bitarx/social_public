<?php
App::uses('ApiController', 'Controller');
/**
 * UserCards Controller
 *
 * @property UserCard $UserCard
 * @property PaginatorComponent $Paginator
 */
class UserCardsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Synth');

    public $uses = array('UserCard', 'UserBaseCard', 'Card', 'UserDeckCard', 'UserParam');

    /**
     * カード一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        // 並べ替え項目セット
        $this->setSort();

        // レア度ソート
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        // 項目ソート
        $sortItem = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;

        // 1:強化 2:進化
        $kind = isset($this->params['kind']) ? $this->params['kind']:1;

        // ベースカード
        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);
        // 進化グループ
        $evolGroup = 0;
        if (2 == $kind) {
            $evolGroup = $userBaseCard['evol_group'];
        }
        if (empty($userBaseCard['user_card_id'])) {
            $userBaseCard['user_card_id'] = 0;
        }

        // デッキカード
        $deckList = $this->UserDeckCard->getUserDeckData($this->userId);
        $notIn = array();
        foreach ($deckList as $val) {
            if (!empty($val['user_card_id'])) $notIn[] = $val['user_card_id'];
        }

        if (0 < count($notIn)) {
            $notIn = array('user_card_id' => $notIn); 
        }
        if (!empty($userBaseCard['user_card_id'])) {
            $notIn['user_card_id'][] = $userBaseCard['user_card_id'];
        }

        // 所有カード
        $pageAll = 0;
        $list = $this->UserCard->getUserCard($this->userId, $cardId = 0, $userBaseCard['user_card_id'], $limit = PAGE_LIMIT, $this->offset, $rareLevel, $sortItem, $evolGroup, $pageAll, $notIn);
        $this->set('list', $list);
        $this->set('data', $userBaseCard);
        $this->set('kind', $kind);
        $this->set('key', 99);
        $this->set('pageAll', $pageAll);
	}

    /**
     * 進化合成確認
     *
     * @author imanishi 
     * @return json
     */
	public function conf() {

        $userCardId = $this->params['user_card_id'];

        // ベースカード
        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);
        // 素材
        $targetData = $this->UserCard->getUserCardById($userCardId);

        // 進化できるか判定
        $judgeEvol = $this->Synth->judgeEvol($userBaseCard, $targetData);
        $list = array($targetData);

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyEvol($userBaseCard);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            $money = false;
        }

        $this->set('useMoney', $useMoney);
        $this->set('money', $money);
        $this->set('data', $userBaseCard);
        $this->set('list', $list);
        $this->set('userParam', $this->userParam);
        $this->set('judgeEvol', $judgeEvol);
	}

    /**
     * 強化合成確認
     *
     * @author imanishi 
     * @return json
     */
	public function confUp() {

        $userCardIds = $this->Common->getParamsInKey($this->params, 'user_card_id_');
        if (!$userCardIds) {
            $this->rd('UserCards', 'index', array('error' => 1)); 
        }

        // ベースカード
        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);
        // 素材
        $targetList = array();
        foreach ($userCardIds as $userCardId) {
            $targetList[] = $this->UserCard->getUserCardById($userCardId);
        }

        // 最大レベル
        $levelMax = 0;
        if ($userBaseCard['card_level'] <= $userBaseCard['level']) {
            $levelMax = 1;
        }


        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyUp($targetList);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            $money = false;
        }

        $this->set('useMoney', $useMoney);
        $this->set('money', $money);
        $this->set('data', $userBaseCard);
        $this->set('list', $targetList);
        $this->set('levelMax', $levelMax);
        $this->set('userParam', $this->userParam);
	}

    /**
     * 進化合成実行
     *
     * @author imanishi 
     * @return void
     */
	public function actEvol() {

        $userCardId = $this->params['user_card_id'];

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

        $targetData = $this->UserCard->getUserCardById($userCardId);
        // 素材が存在しなければ不正
        if (!$targetData) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        // デッキに存在するものは素材に使えない
        $isDeck = $this->UserDeckCard->isDeck($userCardId);
        if ($isDeck) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        // 進化できるか判定
        $judgeEvol = $this->Synth->judgeEvol($userBaseCard, $targetData);
        if (!$judgeEvol) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyEvol($userBaseCard);
        if ($this->userParam['money'] < $useMoney) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

$this->log('baseCard'); 
$this->log($userBaseCard['card_id']); 
$this->log('targetCard'); 
$this->log($targetData['card_id']); 
        $afterCardId = $this->Synth->doSynthEvol($userBaseCard['card_id'], $targetData['card_id']);
$this->log('afterCardId'); 
$this->log($afterCardId); 
        if (!empty($afterCardId)) {
            // 進化後のカードデータ取得
            $cardData = $this->Card->getCardData($afterCardId);

            $this->UserCard->begin(); 
            try {  
                $values = array(
                    'user_id' => $this->userId 
                ,   'card_id' => $cardData['card_id'] 
                ,   'hp' => $cardData['card_hp'] 
                ,   'hp_max' => $cardData['card_hp'] 
                ,   'atk' => $cardData['card_atk'] 
                ,   'def' => $cardData['card_def'] 
                );
                $ret = $this->UserCard->save($values);

                // ベースカード更新
                $values = array(
                    'user_id'      => $this->userId  
                ,   'user_card_id' => $ret['UserCard']['user_card_id']
                );
                $this->UserBaseCard->save($values);

                // 元カードと素材を削除
                $where = array('UserDeckCard.user_card_id' => $userBaseCard['user_card_id']);
                $this->UserDeckCard->deleteAll($where);

                // 演出に表示必要なのでカードは論理削除
                $value = array(
                    'user_card_id' => $userBaseCard['user_card_id']
                ,   'delete_flg' => 1
                );
                $this->UserCard->save($value);


                $where = array('UserDeckCard.user_card_id' => $targetData['user_card_id']);
                $this->UserDeckCard->deleteAll($where);

                // 演出に表示必要なのでカードは論理削除
                $value = array(
                    'user_card_id' => $targetData['user_card_id']
                ,   'delete_flg' => 1
                );
                $this->UserCard->save($value);

                // 消費ゴールド減算
                $this->userParam['money'] -= $useMoney;
                $this->UserParam->save($this->userParam);

            
            } catch (AppException $e) { 
                $this->UserCard->rollback(); 
                $this->log($e->errmes);
                return $this->rd('Errors', 'index', array('error'=> 2)); 
            } 
            $this->UserCard->commit(); 

        } else {
            // 進化できる組み合わせではない
            $this->rd('UserCards', 'conf', array('error'=> 1)); 
        }


        $params = array(
            'base_card' => $userBaseCard['card_id']
        ,   'target' => $targetData['card_id']
        ,   'after_card' => $afterCardId
        );

        $this->rd('UserCards', 'productEvol', $params);
	}

    /**
     * 強化合成実行
     *
     * @author imanishi 
     * @return void
     */
	public function actUp() {

        $userCardIds = $this->Common->getParamsInKey($this->params, 'user_card_id_');
        if (!$userCardIds) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

        if ($userBaseCard['card_level'] <= $userBaseCard['level']) {
            // レベル最大
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        $targetList = array(); 
        $targetData = array();
        foreach ($userCardIds as $key => $userCardId) {
            $tmp = $this->UserCard->getUserCardById($userCardId);
            $isDeck = $this->UserDeckCard->isDeck($userCardId);
            if (!empty($tmp) && empty($isDeck)) {
                $targetList[$key] = $tmp;
                $i = $key + 1;
                $targetData['target_' . $i] = $targetList[$key]['card_id'];
            }
        }

        if (empty($targetList)) {
            // 素材がない
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyUp($targetList);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            // お金がない
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => 1)); 
        }

        $upExp = 0;
        $cardData = $this->Synth->doSynthUp($userBaseCard, $targetList, $upExp);


        $this->UserCard->begin(); 
        try {  
            $values = array(
                'user_card_id' => $userBaseCard['user_card_id'] 
            ,   'card_id' => $cardData['card_id'] 
            ,   'hp' => $cardData['hp'] 
            ,   'hp_max' => $cardData['hp_max'] 
            ,   'atk' => $cardData['atk'] 
            ,   'def' => $cardData['def'] 
            ,   'level' => $cardData['level'] 
            ,   'exp' => $cardData['exp'] 
            ,   'skill_level' => $cardData['skill_level'] 
            );
            $this->UserCard->save($values);

            // 素材論理削除
            foreach ($userCardIds as $id) {
                $where = array(
                    'user_card_id' => $id
                ,   'delete_flg' => 1
                ); 
                $this->UserCard->save($where);
            }

            // 消費ゴールド減算
            $this->userParam['money'] -= $useMoney;
            $this->UserParam->save($this->userParam);
        
        } catch (AppException $e) { 
            $this->UserCard->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserCard->commit(); 

        $startExp = $userBaseCard['exp'] % 100;

        $data = array(
            'base_card' => $userBaseCard['card_id']
        ,   'up_exp'    => $upExp
        ,   'start_exp' => $startExp
        );
        $params = array_merge($data, $targetData);

        $this->rd('UserCards', 'productUp', $params);
	}


    /**
     * 進化合成演出
     *
     * @author imanishi 
     * @return void
     */
    public function productEvol() {

        // 共通レイアウトは使わない
        $this->layout = '';

        // パラメータ取得
        $baseCard = isset($this->params['base_card']) ? $this->params['base_card'] : 0;
        $target = isset($this->params['target']) ? $this->params['target'] : 0;
        $afterCard = isset($this->params['after_card']) ? $this->params['after_card'] : 0;
        if (empty($baseCard) || empty($target) || empty($afterCard)) {
            $this->rd('UserCards', 'index', array('error' => 1));
        }

        // ベースカード
        $baseCard = FILEOUT_URL . '?size=m&dir=card&target=' . $baseCard;

        // 素材カード
        $target = FILEOUT_URL . '?size=m&dir=card&target=' . $target;

        // 合成後カード
        $afterCard = FILEOUT_URL . '?size=l&dir=card&target=' . $afterCard;

        $this->set('baseCard', $baseCard);
        $this->set('target', $target);
        $this->set('afterCard', $afterCard);
    }

    /**
     * 強化合成演出
     *
     * @author imanishi 
     * @return void
     */
    public function productUp() {
        // 共通レイアウトは使わない
        $this->layout = '';

        // パラメータ取得
        $baseCard = isset($this->params['base_card']) ? $this->params['base_card'] : 0;
        $upExp = isset($this->params['up_exp']) ? $this->params['up_exp'] : 0;
        $startExp = isset($this->params['start_exp']) ? $this->params['start_exp'] : 0;

        $list = array();
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($this->params['target_' . $i])) {
                $list[] = FILEOUT_URL . '?size=m&dir=card&target=' . $this->params['target_' . $i];
            }
        }

        if (empty($baseCard) || empty($list) || empty($upExp)) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('UserCards', 'index', array('error' => 1));
        }

        // ベースカード情報
        $cardInfo = $this->Card->getCardData($baseCard);

        $sacrificeList = json_encode($list);
        $baseCard = FILEOUT_URL . '?size=l&dir=card&target=' . $baseCard;
        $endExp = $upExp + $startExp;

        $maxExp = $cardInfo['card_level'] * 100;

        // レベルアップ演出回数を抑える
        if ($maxExp < $endExp) {
            $endExp = $maxExp;
        }

        $this->set('baseCard', $baseCard);
        $this->set('sacrificeList', $sacrificeList);
        $this->set('startExp', $startExp);
        $this->set('endExp', $endExp);
    }

    /**
     * カードを物理削除
     *
     * @author imanishi 
     */
    public function delete() { 

        $where = array(
            'UserCard.user_id' => $this->userId 
        ,   'UserCard.delete_flg' => 1
        );
        $this->UserCard->begin(); 
        try {  
$this->log('deleteStartttttttttttttttttttttttt:'); 
$this->log('aryData:' . print_r($where, true)); 
            $this->UserCard->deleteAll($where);
        } catch (AppException $e) { 
            $this->UserCard->rollback(); 
            $this->log($e->errmes); 
            $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserCard->commit(); 
$this->log('deleteEndddddddd:'); 

        $this->rd('UserCards', 'index', array('end' => 1));  
    } 

    /**
     * 条件検索(変更禁止)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this->UserCard->getAllFind($this->request->query, $fields);
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

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            if ($this->UserCard->save($this->request->query)) {
                $ary = array('result' => 1);
            } else {
                $ary = array('result' => 0);
            }
        } else {
            $ary = array('result' => 2);
        }

        $this->setJson($ary);
	}


}
