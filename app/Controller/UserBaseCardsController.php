<?php
App::uses('ApiController', 'Controller');
/**
 * UserBaseCards Controller
 *
 */
class UserBaseCardsController extends ApiController {


    public $components = array('Paginator', 'Synth');

    public $uses = array('UserCard', 'UserBaseCard', 'Card');

    /**
     * カード一覧
     *
     * @author imanishi 
     * @return void
     */
    public function index() {

        $list = $this->UserCard->getUserCard($this->userId);
   $this->log('aryData:' . print_r($list, true));
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
