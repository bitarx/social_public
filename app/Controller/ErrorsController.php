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

        if (is_numeric($id)) {
            $where  = array('error_id' => $id);
            $mes = $this->Error->field('message', $where);
            $this->set('mes', $mes);
        } else {
            $mes = 'カード所持数が最大の'. CARD_MAX_NUM . '枚に近づいています。合成などで枚数を減らしてください。';
            $this->set('mes', $mes);
            $this->set('guideId', 1 );
        }
	}

}
