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
	public $components = array('Common');

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
            $this->set('guideId', 3 );
        } else {
            $no = $this->request->query['mente_no'];
           
            if (2 == $no) {
                $mes = 'メンテナンス時間を延長します。終了予定は'. parent::$menteEnd . 'となっています。ご迷惑をお掛けして申し訳ございません。';
            } else {
                $mes = 'ただいまメンテナンス中です。終了予定は'. parent::$menteEnd . 'となっています。それまでしばらくお待ちください。';
            }
            $this->set('mes', $mes);
            $this->set('guideId', 1 );
        }
	}

}
