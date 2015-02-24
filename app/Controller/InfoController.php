<?php
App::uses('ApiController', 'Controller');
/**
 * Info Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class InfoController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Common');

	public $use = array('Info');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        
        $pageAll = 1;
        $list = $this->Info->getList($limit = PAGE_LIMIT, array(), $this->offset, $pageAll);

        $this->set('list',  $list);
        $this->set('pageAll',  $pageAll);
        $this->set('title',  'お知らせ一覧');
	}

    public function view($id) {

        $where = array('news_id' => $id);
        $data = $this->Info->getAllFind($where, array(), 'first');
        $timesp = strtotime($data['start_time']);
        $data['start_time'] = date("Y/m/d G時", $timesp);
        $this->set('data', $data);
        $this->set('subTitle', $data['news_title']. '&nbsp;<span style="color:#FFA500">' .$data['start_time'] . '</span>');
    }



}
