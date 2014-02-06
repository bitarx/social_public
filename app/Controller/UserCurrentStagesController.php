<?php
App::uses('ApiController', 'Controller');
/**
 * UserCurrentStages Controller
 *
 * @property UserCurrentStage $UserCurrentStage
 * @property PaginatorComponent $Paginator
 */
class UserCurrentStagesController extends ApiController {

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

        $fields = func_get_args();
        $list = $this->UserCurrentStage->getAllFind($this->request->query, $fields);
        $this->setJson($list);
	}

    /**
     * 条件検索(変更禁止)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        $fields = func_get_args();
        $list = $this->UserCurrentStage->getAllFind($this->request->query, $fields);
        $this->setJson($list);
    }

    /**
     * 登録更新(変更禁止)
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function init() {

        if ($this->request->is(array('put'))) {
            if ($this->UserCurrentStage->save($this->request->query)) {
                $ary = array('result' => 1);
            } else {
                $ary = array('result' => 0);
            }
        } else {
            $ary = array('result' => 2);
        }

        $this->setJson($ary);
	}


}
