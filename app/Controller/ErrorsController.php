<?php
App::uses('ApiController', 'Controller');
/**
 * Errors Controller
 *
 */
class ErrorsController extends ApiController {

    /**
     * Scaffold
     *
     * @var mixed
     */
	public $scaffold;


    /**
     * index method
     *
     * @author imanishi
     * @return json
     */
    public function index() {

        $where['id'] = $this->request->query['error'];

        $mes = $this->Error->getAllFind($where, $fields = array('message'));
        $this->set('mes', $mes[0]['Error']['message']);
    }
}
