<?php
App::uses('ApiController', 'Controller');
/**
 * StaticPages Controller
 *
 * @property StaticPage $StaticPage
 * @property PaginatorComponent $Paginator
 */
class StaticPagesController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    /**
     * ヘルプページ
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $this->set('guideId', 1 );
	}


}
