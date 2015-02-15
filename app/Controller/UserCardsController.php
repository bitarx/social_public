<?php
App::uses('ApiController', 'Controller');
/**
 * UserCards Controller
 *
 * @property UserCard $UserCard
 * @property PaginatorComponent $Paginator
 */
class UserCardsController extends ApiController {

    public static $invitePoint3Text = '招待特典【初めての進化合成】';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Synth');

    public $uses = array('UserCard', 'UserBaseCard', 'Card', 'UserDeckCard', 'UserParam', 'UserCollect', 'CardGroup', 'UserEvolLog', 'FriendInvite', 'FriendInvitePresent', 'UserPresentBox');

    /**
     * カード一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        // 並べ替え項目セット
        $this->setSort();

        $addParam = '';

        // レア度ソート
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        if (!empty($this->request->data['rare_level'])) {
            $rareLevel = $this->request->data['rare_level'];
        }

        // 項目ソート
        $sortItem = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;
        if (!empty($this->request->data['sort_item'])) {
            $sortItem = $this->request->data['sort_item'];
        }

        if (!empty($rareLevel) || !empty($sortItem)) { 
            $addParam .= '&rare_level='. $rareLevel . '&sort_item=' . $sortItem;
        }

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

        // 進化段階取得
        foreach ($list as &$val) {
            $val['next'] = $this->CardGroup->getNext($val['card_id']);
        }

        $this->set('list', $list);
        $this->set('data', $userBaseCard);
        $this->set('kind', $kind);
        $this->set('key', 99);
        $this->set('pageAll', $pageAll);
        $this->set('addParam', $addParam);
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
        $targetData['next'] = $this->CardGroup->getNext($targetData['card_id']);

        // 進化できるか判定
        $judgeEvol = $this->Synth->judgeEvol($userBaseCard, $targetData);
        $list = array($targetData);

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyEvol($userBaseCard);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            $money = false;
        }

        // 進化段階取得
        foreach ($list as &$val) {
            $val['next'] = $this->CardGroup->getNext($val['card_id']);
        }

        $this->set('useMoney', $useMoney);
        $this->set('money', $money);
        $this->set('data', $userBaseCard);
        $this->set('list', $list);
        $this->set('userParam', $this->userParam);
        $this->set('key', 99);
        $this->set('judgeEvol', $judgeEvol);
	}

    /**
     * 強化合成確認
     *
     * @author imanishi 
     * @return json
     */
	public function confUp() {

        $userCardIds = $this->Common->getParamsInKey($this->request->data, 'user_card_id_');
        if (!$userCardIds) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('UserCards', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
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

        // 素材が存在しなければ不正
        if (empty($targetList)) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // 消費ペニー
        $useMoney = $this->Synth->useMoneyUp($targetList);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            $money = false;
        }

        // 進化段階取得
        foreach ($targetList as &$val) {
            $val['next'] = $this->CardGroup->getNext($val['card_id']);
        }

        $this->set('useMoney', $useMoney);
        $this->set('money', $money);
        $this->set('data', $userBaseCard);
        $this->set('list', $targetList);
        $this->set('levelMax', $levelMax);
        $this->set('key', 99);
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
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // デッキに存在するものは素材に使えない
        $isDeck = $this->UserDeckCard->isDeck($userCardId);
        if ($isDeck) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // 進化できるか判定
        $judgeEvol = $this->Synth->judgeEvol($userBaseCard, $targetData);
        if (!$judgeEvol) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyEvol($userBaseCard);
        if ($this->userParam['money'] < $useMoney) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        $afterCardId = $this->Synth->doSynthEvol($userBaseCard['card_id'], $targetData['card_id']);
        if (!empty($afterCardId)) {
            // 進化後のカードデータ取得
            $cardData = $this->Card->getCardData($afterCardId);

            $firstFlg = false;

            // 進化合成が初めてか確認
            $where = array('UserEvolLog.user_id' => $this->userId);
            $isEvol = $this->UserEvolLog->field('id', $where);
            if (empty($isEvol)) {
                $firstFlg = true;
            }

            $this->UserCard->begin(); 
            try {  
                $values = array(
                    'user_id'     => $this->userId 
                ,   'card_id'     => $cardData['card_id'] 
                ,   'hp'          => $cardData['card_hp'] 
                ,   'hp_max'      => $cardData['card_hp'] 
                ,   'atk'         => $cardData['card_atk'] 
                ,   'def'         => $cardData['card_def'] 
                ,   'skill_level' => $userBaseCard['skill_level']     // スキルレベルは引き継ぐ
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
                $update = array('UserDeckCard.user_card_id' => 0);
                $this->UserDeckCard->updateAll($update, $where);

                // 演出に表示必要なのでカードは論理削除
                $value = array(
                    'user_card_id' => $userBaseCard['user_card_id']
                ,   'delete_flg' => 1
                );
                $this->UserCard->save($value);


                $where = array('UserDeckCard.user_card_id' => $targetData['user_card_id']);
                $this->UserDeckCard->updateAll($update, $where);

                // 演出に表示必要なのでカードは論理削除
                $value = array(
                    'user_card_id' => $targetData['user_card_id']
                ,   'delete_flg' => 1
                );
                $this->UserCard->save($value);

                // 消費ゴールド減算
                $this->userParam['money'] -= $useMoney;
                $this->UserParam->save($this->userParam);

               // コレクション登録
               $this->UserCollect->initCollect($this->userId, $afterCardId);

               // 進化ログ
               $value = array(
                   'user_id' => $this->userId
               ,   'base_card_id' => $userBaseCard['card_id']
               ,   'target_card_id' => $targetData['card_id']
               ,   'after_card_id'  => $afterCardId
               );
               $this->UserEvolLog->save($value);

               
               // 進化合成が初めてであれば招待インセンティブ対象
/*
               if ($firstFlg) {

                   // 招待されたユーザー確認
                   $where = array(
                        'invite_sns_user_id' => $this->ownerId 
                    ,   'callback_flg' => 1 
                    ,   'point3_flg' => 0 
                   );
                   $inviteUserId = $this->FriendInvite->field('FriendInvite.user_id', $where);

                   // 招待されたユーザーであればインセンティブ振込み
                   if (!empty($inviteUserId)) {
                        // 双方の電話番号認証を確認
                        $self = $this->snsUtil->getTelAuth($this->ownerId);
                        $where = array(
                            'User.user_id' => $inviteUserId
                        );
                        $inviteOwnerId = $this->User->field('sns_user_id', $where);
                        $inviteUser = $this->snsUtil->getTelAuth($inviteOwnerId);

                        // 電話番号認証が双方取れている場合は振り込む
                        if (!empty($self['telAuthResult']) && !empty($inviteUser['telAuthResult'])) {
                            $pList = $this->FriendInvitePresent->getList($point = 3);
                            if (empty($pList)) {
                                $this->log(__FILE__.__LINE__. ' Insentive Error In Point3 : ownerId : '. $this->ownerId);
                            } else {
 $this->log('present start'); 
                                $mes = self::$invitePoint3Text;
                                $present = array();
                                $presentInvite = array();
                                foreach ($pList as $val) {
                                    $present[] = array($this->userId, $val['kind'], $val['target'], $val['num'], $mes);
                                    $presentInvite[] = array($inviteUserId, $val['kind'], $val['target'], $val['num'], $mes);
                                }
                                // 招待した人へ振込み
                                $this->UserPresentBox->registPBox($present);

                                // 招待された人へ振込み
                                $this->UserPresentBox->registPBox($presentInvite);

                                // フラグ更新
                                $values = array(
                                    'point3_flg' => 1
                                ,   'FriendInvite.modified' => NOW_DATE_DB    
                                );
                                $where = array(
                                    'FriendInvite.user_id' => $inviteUserId 
                                ,   'invite_sns_user_id'   => $this->ownerId 
                                );
                                $this->FriendInvite->updateAll($values, $where);
                           }
                       }
                   }
               }
*/           
            } catch (AppException $e) { 
                $this->UserCard->rollback(); 
                $this->log($e->errmes);
                return $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
            $this->UserCard->commit(); 

        } else {
            // 進化できる組み合わせではない
            $this->rd('UserCards', 'conf', array('error'=> ERROR_ID_BAD_OPERATION )); 
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

        $userCardIds = $this->Common->getParamsInKey($this->request->data, 'user_card_id_');
        if (!$userCardIds) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

        if ($userBaseCard['card_level'] <= $userBaseCard['level']) {
            // レベル最大
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
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
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // 消費ゴールド
        $useMoney = $this->Synth->useMoneyUp($targetList);
        $money = true;
        if ($this->userParam['money'] < $useMoney) {
            // お金がない
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        $upExp = 0;
        $bigSFlg = 0;
        $cardData = $this->Synth->doSynthUp($userBaseCard, $targetList, $upExp, $bigSFlg);

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
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->UserCard->commit(); 

        $startExp = $userBaseCard['exp'] % 100;

        $data = array(
            'base_card' => $userBaseCard['card_id']
        ,   'up_exp'    => $upExp
        ,   'start_exp' => $startExp
        ,   'bigs_flg'  => $bigSFlg
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
            $this->rd('UserCards', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        $add = "";
        if (!empty($this->ownerInfo)) {
            $add = '?' . $this->ownerInfo;
        }

        // ベースカード
        $baseCard = IMG_URL . CARD_L_DIR . DS . 'card_l_' . $baseCard . '.jpg'. $add;

        // 素材カード
        $target = IMG_URL . CARD_L_DIR . DS . 'card_l_' . $target . '.jpg'. $add;

        // 合成後カード
        $afterCard = IMG_URL . CARD_L_DIR . DS . 'card_l_' . $afterCard . '.jpg'. $add;

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
        $bigSFlg = isset($this->params['bigs_flg']) ? $this->params['bigs_flg'] : 0;
        $startExp = isset($this->params['start_exp']) ? $this->params['start_exp'] : 0;

        $list = array();
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($this->params['target_' . $i])) {
                $list[] = URL_PRE . IMG_URL . 'card/card_m_' . $this->params['target_' . $i] . '.jpg';
            }
        }

        if (empty($baseCard) || empty($list) || empty($upExp)) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('UserCards', 'index', array('error' => ERROR_ID_BAD_OPERATION ));
        }

        // ベースカード情報
        $cardInfo = $this->Card->getCardData($baseCard);

        $sacrificeList = json_encode($list);
        $add = "";
        if (!empty($this->ownerInfo)) {
            $add = '?' . $this->ownerInfo;
        }
        $baseCard = IMG_URL . CARD_L_DIR . DS . 'card_l_' . $cardInfo['card_id'] . '.jpg'. $add;

        $endExp = $upExp + $startExp;

        $this->set('bigSFlg', $bigSFlg);
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
            $this->UserCard->deleteAll($where);
        } catch (AppException $e) { 
            $this->UserCard->rollback(); 
            $this->log($e->errmes); 
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->UserCard->commit(); 

        $this->rd('UserCards', 'index', array('end' => 1));  
    } 

    /**
     * 所有カード一覧
     *
     * @author imanishi 
     */
	public function cardList() {

        // 並べ替え項目セット
        $this->setSort();

        $addParam = '';

        // レア度ソート
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        if (!empty($this->request->data['rare_level'])) {
            $rareLevel = $this->request->data['rare_level'];
        }

        // 項目ソート
        $sortItem = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;
        if (!empty($this->request->data['sort_item'])) {
            $sortItem = $this->request->data['sort_item'];
        }

        if (!empty($rareLevel) || !empty($sortItem)) { 
            $addParam .= '&rare_level='. $rareLevel . '&sort_item=' . $sortItem;
        }

        // 1:強化 2:進化
        $kind = isset($this->params['kind']) ? $this->params['kind']:1;

        // ベースカード
        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);
        // 進化グループ
        $evolGroup = 0;
        if (empty($userBaseCard['user_card_id'])) {
            $userBaseCard['user_card_id'] = 0;
        }

        $notIn = array();

        // 所有カード
        $pageAll = 0;
        $list = $this->UserCard->getUserCard($this->userId, $cardId = 0, $userBaseCard['user_card_id'], $limit = PAGE_LIMIT, $this->offset, $rareLevel, $sortItem, $evolGroup, $pageAll, $notIn);

        // 進化段階取得
        foreach ($list as &$val) {
            $val['next'] = $this->CardGroup->getNext($val['card_id']);
        }

        $this->set('list', $list);
        $this->set('data', $userBaseCard);
        $this->set('kind', $kind);
        $this->set('key', 99);
        $this->set('pageAll', $pageAll);
        $this->set('addParam', $addParam);
	}

}
