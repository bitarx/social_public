<?php
App::uses('ApiController', 'Controller');
/**
 * UserBaseCards Controller
 *
 */
class UserBaseCardsController extends ApiController {


    public $components = array('Paginator', 'Synth');

    public $uses = array('UserCard', 'UserBaseCard', 'Card', 'CardGroup');

    /**
     * カード一覧
     *
     * @author imanishi 
     * @return void
     */
    public function index() {

        $userBaseCard = $this->UserBaseCard->getUserBaseCardData ($this->userId);

        $pageAll = 0;
        $list = $this->UserCard->getUserCard($this->userId, $cardId = 0, $userBaseCard['user_card_id'], $limit = PAGE_LIMIT, $this->offset, $rareLevel=0, $sortItem=0, $evolGroup=0, $pageAll);

        // 進化段階取得
        foreach ($list as &$val) {
            $val['next'] = $this->CardGroup->getNext($val['card_id']);
        }

        $this->set('pageAll', $pageAll);
        $this->set('list', $list);
    }

    /**
     * ベースカード更新
     *
     * @author imanishi 
     * @return void
     */
    public function initBaseCard() {

        $userCardId = $this->params['user_card_id'];
        if (empty($userCardId)) {
            $this->log( __FILE__ .  ':' . __LINE__ .':userId:' . $this->userId ); 
            $this->rd('Errors', 'index', array('error'=> 1)); 
        }

        $this->UserBaseCard->begin(); 
        try {  

            $values = array(
                'user_id' => $this->userId 
            ,   'user_card_id' => $userCardId 
            );
            $this->UserBaseCard->save($values); 
        } catch (AppException $e) { 
            $this->UserBaseCard->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserBaseCard->commit(); 

        $this->rd('UserCards', 'index'); 
    }

}
