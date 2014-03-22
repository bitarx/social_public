<?php
App::uses('ApiController', 'Controller');
/**
 * Helps Controller
 *
 */
class HelpsController extends ApiController {

    /**
     * Scaffold
     *
     * @var mixed
     */
	public $scaffold;


    /**
     * index
     *
     * @author imanishi
     * @return void
     */
    public function index() {


        $this->set('row',  'aaaa');
    }

}
