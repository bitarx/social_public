<?php
App::uses('ApiController', 'Controller');
/**
 * UserDeckCards Controller
 *
 * @property UserDeckCard $UserDeckCard
 * @property PaginatorComponent $Paginator
 */
class UserDeckCardsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('UserDeckCard', 'UserCard', 'UserBaseCard', 'UserDeck');

    /**
     * index method
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        $list = $this->UserDeckCard->getUserDeckData($this->userId );
        if (!empty($list)) {
            foreach ($list as &$val) {
                $tmp = array(
                    'user_deck_id' => $val['user_deck_id'] 
                ,   'deck_number' => $val['deck_number']
                );
                $val['params'] = json_encode($tmp); 
            }
        }
        // 現地点のデッキ使用コスト
        $cost = $this->UserDeckCard->getCost($this->userId);

        $this->set('list', $list);
        $this->set('cost', $cost);
        $this->set('costAtk', $this->userParam['cost_atk']);
    }

    /**
     * delete method
     *
     * @author imanishi 
     * @return void
     */
	public function delete() {
        $userDeckId = isset($this->params['user_deck_id']) ? $this->params['user_deck_id'] : 0;
        $deckNumber = isset($this->params['deck_number']) ? $this->params['deck_number'] : 0;

       if (empty($userDeckId) || empty($deckNumber)) {
           $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
           $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
       }

       $this->UserDeckCard->begin(); 
       try {  
           $where = array(
               'UserDeckCard.user_deck_id' => $userDeckId
           ,   'UserDeckCard.deck_number' => $deckNumber
           );
           $values = array(
               'user_card_id' => 0
           ,   'modified' => "'" . date("Y-m-d H:i:s") . "'"
           );
           $this->UserDeckCard->updateAll($values, $where);
       } catch (AppException $e) { 
           $this->UserDeckCard->rollback(); 
           $this->log($e->errmes); 
           $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
       } 
       $this->UserDeckCard->commit(); 

       $this->rd('UserDeckCards', 'index', array('del_end' => 1)); 
    }

    /**
     * initList method
     *
     * @author imanishi 
     * @return void
     */
    public function initList() { 
    
        // 並べ替え項目セット
        $this->setSort();

        // ユーザデッキID
        $userDeckId = isset($this->params['user_deck_id']) ? $this->params['user_deck_id'] : 0;
        // デッキナンバー
        $deckNumber = isset($this->params['deck_number']) ? $this->params['deck_number'] : 0;
        // コストオーバー
        $over = isset($this->params['over']) ? $this->params['over'] : 0;

        // レア度ソート
        $rareLevel = isset($this->params['rare_level']) ? $this->params['rare_level'] : 0;
        // 項目ソート
        $sortItem = isset($this->params['sort_item']) ? $this->params['sort_item'] : 0;

        $kind = 1;

        $deckList = $this->UserDeckCard->getUserDeckData($this->userId );
        foreach ($deckList as $val) {
            if (!empty($val['user_card_id'])) {
                $userCardIds[] = $val['user_card_id'];
            }
            // 選択デッキカード
            if ($userDeckId == $val['user_deck_id'] && $deckNumber == $val['deck_number']) {
                $selectDeckCard = $val;
            }
        }
        
        // 進化グループ
        $evolGroup = 0;

        // NOT IN
        $notIn = array('user_card_id' => $userCardIds);

        // 所有カード
        $pageAll = 0;
        $list = $this->UserCard->getUserCard($this->userId, $cardId = 0, 0, $limit = PAGE_LIMIT, $this->offset, $rareLevel, $sortItem, $evolGroup, $pageAll, $notIn);

        // 引き回しパラメータ
        $addParam = '&user_deck_id=' . $userDeckId . '&deck_number=' . $deckNumber;

        // 現地点のデッキ使用コスト
        $cost = $this->UserDeckCard->getCost($this->userId);

        // アサイン
        $this->set('list', $list);
        $this->set('data', $selectDeckCard);
        $this->set('kind', $kind);
        $this->set('pageAll', $pageAll);
        $this->set('user_deck_id', $userDeckId);
        $this->set('deck_number', $deckNumber);
        $this->set('addParam', $addParam);
        $this->set('over', $over);

        $this->set('cost', $cost);
        $this->set('costAtk', $this->userParam['cost_atk']);
    } 

    /**
     * init method
     *
     * @author imanishi 
     * @return void
     */
	public function init() {

        // ユーザデッキID
        $userDeckId = isset($this->params['user_deck_id']) ? $this->params['user_deck_id'] : 0;
        // デッキナンバー
        $deckNumber = isset($this->params['deck_number']) ? $this->params['deck_number'] : 0;
        // カードID
        $userCardId = isset($this->params['user_card_id']) ? $this->params['user_card_id'] : 0;

       if (empty($userDeckId) || empty($deckNumber) || empty($userCardId)) {
           // パラメータ異常
           $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
           $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
       }

       // 選択カード
       $card = $this->UserCard->getUserCardById($userCardId);
       // 現地点のデッキ使用コスト
       $cost = $this->UserDeckCard->getCost($this->userId);

       // 総コスト
       $costAll = $cost + $card['card_cost'];

       if ($this->userParam['cost_atk'] < $costAll) {
           $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
           $param = array(
               'over' => 1
           ,   'user_deck_id' => $userDeckId
           ,   'deck_number'  => $deckNumber
           );
           $this->rd('UserDeckCards', 'initList', $param); 
       }


        $this->UserDeckCard->begin();
        try {
            $where = array(
                'UserDeckCard.user_deck_id' => $userDeckId 
            ,   'UserDeckCard.deck_number'  => $deckNumber 
            );
            $values = array(
                'user_card_id'     => $userCardId
            ,   'modified' => "'" . date("Y-m-d H:i:s") . "'"
            );
            $this->UserDeckCard->updateAll($values, $where);

        } catch (AppException $e) {

            $this->UserDeckCard->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => ERROR_ID_SYSTEM )
                   ));
        }
        $this->UserDeckCard->commit();

        $this->rd('UserDeckCards', 'index', array('init_end' => 1)); 
	}

    /**
     * sortAtk method
     *
     * @author imanishi 
     * @return void
     */
	public function sortAtk() {

        // 攻撃力高い順で５レコード取得
        $list = $this->UserCard->getUserCard ($this->userId, $cardId = 0, $userCardId = 0, $limit = 5, $offset = 0, $rareLevel = 0, $sortItem = 6);

        // デッキID取得
        $userDeckData = $this->UserDeck->getUserDeckData($this->userId);
        $userDeckId   = $userDeckData['user_deck_id'];

        $cost = 0;

        $this->UserDeckCard->begin(); 
        try {  
            for ($i = 1; $i <= 5; $i++) {
                $key = $i - 1;
                $cost += isset($list[$key]['card_cost']) ? $list[$key]['card_cost']:0;
                if (!empty($list[$key]['user_card_id']) && $cost <= $this->userParam['cost_atk']) {
                    $userCardId = $list[$key]['user_card_id'];
                } else {
                    $userCardId = 0;
                }
                $value = array(
                    'user_card_id' => $userCardId
                ,   'modified' => "'" . date("Y-m-d H:i:s") . "'"
                );
                $where = array(
                    'UserDeckCard.user_deck_id' => $userDeckId
                ,   'UserDeckCard.deck_number'  => $i
                );
                $this->UserDeckCard->updateAll($value, $where);
            }
        
        } catch (AppException $e) { 
            $this->UserDeckCard->rollback(); 
            $this->log($e->errmes); 
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 
        $this->UserDeckCard->commit(); 
         
        $this->rd('UserDeckCards', 'index', array('sotr_act' => 1));  
    }
}
