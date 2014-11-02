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
	public $components = array('Paginator');

    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $fields = array('id');
        $where  = array();
        $this->Info->getAllFind($where, $fields);
        $this->set('news', $this->Paginator->paginate());

        $this->Info->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->Info->save($values);
            if (!$ret) {
                throw new AppException('News save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->News->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->Info->commit();
	}

    public function view($id) {

        $where = array('news_id' => $id);
        $data = $this->Info->getAllFind($where, array(), 'first');
        $timesp = strtotime($data['start_time']);
        $data['start_time'] = date("Y/m/d G時", $timesp);
        $this->set('data', $data);
    }



}
