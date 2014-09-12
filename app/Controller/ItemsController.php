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

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        $fields = array();
        $where  = array('Item.point > ' => 0);
        $list = $this->Item->getAllFind($where, $fields);
    $this->log($list); 
        $this->set('list', $list);
	}

    /**
     * index method
     *
     * @author imanishi 
     */
	public function conf($itemId) {

        $fields = array();
        $where  = array('Item.item_id' => $itemId);
        $data = $this->Item->getAllFind($where, $fields, 'first');
    $this->log($data); 
        $this->set('data', $data);
	}

}
