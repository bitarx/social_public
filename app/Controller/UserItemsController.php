<?php
App::uses('ApiController', 'Controller');
/**
 * UserItems Controller
 *
 */
class UserItemsController extends ApiController {

    /**
     * Scaffold
     *
     * @var mixed
     */
	public $scaffold;


    public $uses = array('User', 'SnsUser', 'UserParam', 'Item', 'UserItem', 'ItemEffect', 'UserStageEffect');

    /**
     * index
     *
     * @author imanishi
     * @return void
     */
    public function index() {

        $where = array(
            'user_id' => $this->userId
        ,   'num > ' => 0     
        );
        $list = $this->UserItem->getAllFind($where);

        $this->set('list',  $list);
        $this->set('nextAction',  'conf');
        $this->set('mes', '保有アイテムはありません。');
        $this->set('guideId', 2 );
    }

    /**
     * conf
     *
     * @author imanishi
     * @return void
     */
    public function conf($userItemId) {

        $where = array('id' => $userItemId);
        $field = array();
        $data = $this->UserItem->getAllFind($where, $field, 'first');

        if (5 <= $data['item_effect_id']) {
            // 確率変動アイテムの使用確認
            $list = array();
            list($effect, $effectSecond) = $this->UserStageEffect->changeProbList($this->userId, $list);
        } else {
            $effect = 0;
        }

        $this->set('data',  $data);
        $this->set('nextAction',  'comp');
        $this->set('effect',  $effect);
    }

    /**
     * comp
     *
     * @author imanishi
     * @return void
     */
    public function comp($userItemId) {

        $where = array(
                       'id' => $userItemId
                    ,  'user_id' => $this->userId 
                    ,  'num > '  => 0
                    );
        $field = array();
        $userItem = $this->UserItem->getAllFind($where, $field, 'first');

        if (empty($userItem)) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => 2));
        }

        $where = array('item_effect_id' => $userItem['item_effect_id']);
        $data = $this->ItemEffect->getAllFind($where,array(),'first');

        if (empty($data)) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => 2));
        }
        switch($data['effect']) {
            // 体力回復
            case 1:
                $actAfter = $this->userParam['act_max'] * ($data['percent'] / 100);
                $this->UserParam->begin();
                try {
                    $values = array(
                        'user_id'  => $this->userId  
                    ,   'act' => $actAfter
                    );
                    $this->UserParam->save($values);    

                    // 減算
                    $userItem['num']--; 
                    $this->UserItem->save($userItem);
                } catch (AppException $e) { 
                    $this->UserParam->rollback(); 
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> 2)); 
                } 
                $this->UserParam->commit();

                break;
            // クエスト出現率
            case 3:
            case 4:
            case 5:
                $this->UserStageEffect->begin();
                try {
                    $values = array(
                        'user_id'  => $this->userId  
                    ,   'effect' => $data['effect']
                    );
                    $this->UserStageEffect->save($values);    

                    // 減算
                    $userItem['num']--; 
                    $this->UserItem->save($userItem);
                } catch (AppException $e) { 
                    $this->UserStageEffect->rollback(); 
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> 2)); 
                } 
                $this->UserStageEffect->commit();

                break;
        }
        
        $param = array('id' => $userItemId);
        $this->rd('UserItems', 'end', $param);
    }

    /**
     * end
     *
     * @author imanishi
     * @return void
     */
    public function end() {

   
        $where = array('id' => $this->params['id']);
        $field = array();
        $data = $this->UserItem->getAllFind($where, $field, 'first');

        $where = array('item_effect_id' => $data['item_effect_id']);
        $field = array('detail_after');
        $data = $this->ItemEffect->getAllFind($where, $field, 'first');
        
        $this->set('data',  $data);
    }
}
