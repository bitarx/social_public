<?php
App::uses('ApiController', 'Controller');
/**
 * Errors Controller
 *
 * @property Error $Error
 * @property PaginatorComponent $Paginator
 */
class ErrorsController extends ApiController {

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

        $this->layout = 'default';

        $id = $this->request->query['error'];
        $where  = array('error_id' => $id);
        $mes = $this->Error->field('message', $where);
        $this->set('mes', $mes);
	}

}
