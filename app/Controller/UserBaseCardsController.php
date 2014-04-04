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

}
