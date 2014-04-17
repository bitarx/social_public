<?php
App::uses('ApiController', 'Controller');
/**
 * UserPresentBoxes Controller
 *
 * @property UserPresentBox $UserPresentBox
 * @property PaginatorComponent $Paginator
 */
class UserPresentBoxesController extends ApiController {

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

        // 1:カード 2:アイテム 3:ゴールド
        $kind = !empty($this->params['kind']) ? $this->params['kind'] : 1; 
        $fields = array();
        $where  = array('user_id' => $this->userId );
        $list = $this->UserPresentBox->getAllFind($where, $fields);
    $this->log('PboxList:' . print_r($list, true)); 
        $this->set('list', $list);
	}

    /**
     * 条件検索(変更禁止)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this->UserPresentBox->getAllFind($this->request->query, $fields);
            $this->setJson($list);
        }
    }

    /**
     * 登録更新(変更禁止)
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function init() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            if ($this->UserPresentBox->save($this->request->query)) {
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
