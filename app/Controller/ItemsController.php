<?php
App::uses('ApiController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('User', 'SnsUser', 'UserParam', 'Item', 'UserItem', 'ItemEffect', 'ItemGroup');

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        $fields = array();
        $where  = array('Item.point > ' => 0);
        $list = $this->Item->getAllFind($where, $fields);

        $this->set('list', $list);
	}

    /**
     * conf method
     *
     * @author imanishi 
     */
	public function conf($itemId) {

        $fields = array();
        $where  = array('item_id' => $itemId);
        $data = $this->Item->getAllFind($where, $fields, 'first');

        // 暫定
        $param = array('item_id' => $itemId);
        $this->rd('Items', 'comp', $param);
	}

    /**
     * comp
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $itemId = $this->params['item_id'];
        $where = array(
                       'item_id' => $itemId
                    );
        $field = array();

        $itemData = $this->Item->getAllFind($where, $field, 'first');

        if (empty($itemData)) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => 2));
        }

        if ( 0 == $itemData['box_num'] ) $itemData['box_num'] = 1;

        // セットアイテムチェック
        $where = array('item_id' => $itemData['item_id']);
        $itemGroup = $this->ItemGroup->getAllFind($where, $field, 'first');

        $newItemId = empty($itemGroup) ? $itemData['item_id'] : $itemGroup['item_base_id'];

        // 存在確認
        $where = array(
                    'user_id'  => $this->userId  
                ,   'item_id'  => $newItemId
                );
        $userItem = $this->UserItem->getAllFind($where,$field, 'first');

        $this->UserItem->begin();
        try {

            if (empty($userItem)) {
                $values = array(
                    'user_id'  => $this->userId  
                ,   'item_id'  => $itemData['item_id']
                ,   'num'      => $itemData['box_num']
                );
                $this->UserItem->save($values);    
            } else {

                $addNum = $userItem['num'] + $itemData['box_num'];
        
                $value = array('num' => $addNum);
                $where = array(
                            'id' => $userItem['id']
                        );
                $this->UserItem->updateAll($value, $where);
            }

        } catch (AppException $e) { 
            $this->UserParam->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> 2)); 
        } 
        $this->UserItem->commit();

        
        $param = array('item_id' => $newItemId);

        $this->rd('Items', 'end', $param);
    }

    /**
     * end
     *
     * @author imanishi
     * @return void
     */
    public function end() {

   
        $where = array('item_id' => $this->params['item_id']);
        $field = array();
        $data = $this->Item->getAllFind($where, $field, 'first');

        $where = array(
                     'user_id' => $this->userId
                 ,   'item_id' => $data['item_id']
                 );
        $userItem = $this->UserItem->getAllFind($where, $field, 'first');

        if (empty($userItem['num'])) {
            $this->log(__FILE__.__LINE__.'userId:'.$this->userId);
            $this->rd('Errors', 'index', array('error' => 2));
        }

        $this->set('data',  $data);
        $this->set('userItemId',  $userItem['id']);
    }

}
