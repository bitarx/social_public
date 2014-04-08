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

        $list = $this->UserCard->getUserCard($this->userId);
        $this->set('list', $list);

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

   $this->log('aryData:' . print_r($userBaseCard, true)); 
        $this->set('data', $userBaseCard);
	}

    /**
     * 合成確認
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
     * 進化合成実行
     *
     * @author imanishi 
     * @return void
     */
	public function actEvol() {

        $userCardId = $this->params['user_card_id'];

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

        $targetData = $this->UserCard->getUserCardById($userCardId);

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

        $afterCardId = $this->Synth->doSynthEvol($userBaseCard['card_id'], $targetData['card_id']);

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
                $where = array('user_card_id' => $userBaseCard['user_card_id']);
                $this->UserDeckCard->delete($where);
                $this->UserCard->delete($where);
                $where = array('user_card_id' => $targetData['user_card_id']);
                $this->UserDeckCard->delete($where);
                $this->UserCard->delete($where);

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
/*
        $targetCards = array();
        for ($i = 1;$i <= 9; $i++) {
            if (isset($this->params['user_card_id_'. $i])) {
                $targetCards['target_card_'. $i] = $this->params['user_card_id_'. $i];
            }
        }

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData($this->userId);

        $targetList = array(); 
        foreach ($targetCards as $key => $userCardId) {
            $targetList[$key] = $this->UserCard->getUserCardById($userCardId);
        }

        if (empty($targetList)) {
            // 素材がない
            return $this->rd('UserCards', 'conf', array('error'=> 2)); 
        }

        $cardData = $this->Synth->doSynthUp($userBaseCard, $targetList);

        $this->UserCard->begin(); 
        try {  
            $values = array(
                'user_card_id' => $userBaseCard['card_id'] 
            ,   'card_id' => $cardData['card_id'] 
            ,   'hp' => $cardData['card_hp'] 
            ,   'hp_max' => $cardData['card_hp'] 
            ,   'atk' => $cardData['card_atk'] 
            ,   'def' => $cardData['card_def'] 
            );
            $this->UserCard->save($values);
        
        } catch (Exception $e) { 
            $this->UserCard->rollback(); 
            $this->log($e->errmes);
            return $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserCard->commit(); 


        $params = array(
            'base_card' => $userBaseCard['card_id']
        ,   'target_1' => $targetData['card_id_1']
        ,   'target_2' => $targetData['card_id_2']
        ,   'target_3' => $targetData['card_id_3']
        ,   'target_4' => $targetData['card_id_4']
        ,   'target_5' => $targetData['card_id_5']
        ,   'target_6' => $targetData['card_id_6']
        ,   'target_7' => $targetData['card_id_7']
        ,   'target_8' => $targetData['card_id_8']
        ,   'target_9' => $targetData['card_id_9']
        );
*/
        $params = array();
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
