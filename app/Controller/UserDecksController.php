<?php
App::uses('ApiController', 'Controller');
/**
 * UserDecks Controller
 *
 * @property UserDeck $UserDeck
 * @property PaginatorComponent $Paginator
 */
class UserDecksController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    /**
     * デッキ一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

       $kind = $this->params['kind'];
       if ($kind == 2) {
           // 防御デッキ
           $kind = 1;
        } else {
           // 攻撃デッキ
           $kind = 2;
        }

        $list = $this->UserDeck->getUserDeckData($this->userId, $kind);
        $this->set('list', $this->Paginator->paginate());

	}

    /**
     * デッキカード選択
     *
     * @author imanishi
     * @return void
     */
    public function conf() {

        $fields = array('id');
        $where  = array();
        $this->User->getAllFind($where, $fields);
        $this->set('users', $this->Paginator->paginate());
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
            $list = $this->UserDeck->getAllFind($this->request->query, $fields);
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

            if ($this->UserDeck->save($this->request->query)) {
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
