<?php
App::uses('AppController', 'Controller');

class SampleController extends AppController {

    public function index() {
        $this->viewClass = 'Json';
        $this->set('posts', 'postdata');
        $this->set('ary', array('hoge' => 1, 'huge' => 3));
        $this->set('_serialize', array('posts', 'ary'));
    }

}

