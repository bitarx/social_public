<?php
App::uses('ApiController', 'Controller');
/**
 * Cards Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class CardsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('Card', 'UserCollect');

    public static $errMes = 'カードの取得履歴が確認できません。受取BOXにある場合は受け取ってください。';

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index($id = 0) {

        if (empty($id)) {
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        // 所有チェック
        $where = array(
            'user_id' => $this->userId
        ,   'Card.card_id' => $id
        );
        $hasCard = $this->UserCollect->field('user_id', $where);
        
        $stageId = !empty($this->params['stage_id']) ? $this->params['stage_id'] : 0 ;

        $where  = array('card_id' => $id);
        $data = $this->Card->getAllFind($where);
        $data = $data[0];

        $this->set('hasCard', $hasCard);
        $this->set('mes', self::$errMes);
        $this->set('guideId', 1 );
        $this->set('data', $data);
        $this->set('stageId', $stageId);
        $this->set('subTitle', $data['card_title']. $data['card_name']);
	}

}
