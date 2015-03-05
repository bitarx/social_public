<?php
App::uses('ApiController', 'Controller');
/**
 * Ranks Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class RanksController extends ApiController {

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
        $evStageId = !empty($this->params['ev_stage_id']) ? $this->params['ev_stage_id'] : 0 ;


        $where  = array('card_id' => $id);
        $data = $this->Card->getAllFind($where);
        $data = $data[0];

        $subTitle = '<span style="color:#FFA500">' . $data['card_title'] . '</span>' . $data['card_name'];

        // voiceチェック
        $docRoot = $_SERVER['DOCUMENT_ROOT'];
        $fname = 'card_' . $data['card_id']. '.mp3';
        $voice = false;
        $file = $docRoot . '/voice/card/'. $fname;
        if (file_exists($file))
            $voice = true;

        $this->set('hasCard', $hasCard);
        $this->set('voice', $voice);
        $this->set('mes', self::$errMes);
        $this->set('guideId', 1 );
        $this->set('data', $data);
        $this->set('stageId', $stageId);
        $this->set('evStageId', $evStageId);
        $this->set('subTitle', $subTitle);
	}

}
