<?php
App::uses('ApiController', 'Controller');
/**
 * UserParams Controller
 *
 * @property UserParam $UserParam
 * @property PaginatorComponent $Paginator
 */
class UserParamsController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator', 'Battle');

    public $uses = array('UserParam', 'UserDeck', 'BattleLog', 'Card');

    /**
     * バトル対戦者一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $this->UserParam->getBattleList($this->userId);
        $this->set('userParams', $this->Paginator->paginate());
/*
        $this->UserParam->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this->UserParam->save($values);
            if (!$ret) {
                throw new AppException('UserParam save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this->UserParam->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this->UserParam->commit();
*/
	}

    /**
     * バトル実行
     *
     * @author imanishi
     * @return void
     */
    public function act() {

        $targetId = $this->params['target_id'];

        // 防御側のデッキ取得
        $targetCards = $this->UserDeck->getUserDeckData($targetId);
        // 攻撃側のデッキ取得
        $userCards = $this->UserDeck->getUserDeckData($this->userId);

        $userCards = $userCards['UserDeckCard'];
        $targetCards = $targetCards['UserDeckCard'];

        // 攻撃側のスキル発動
        foreach ($userCards as $key => $val) {
            $userCard = $val['UserCard'];
            mt_srand();
            $hit = mt_rand(1, 100);
            // 当選
            if ($hit <= $userCard['skill_level']) {
                // カードのスキル取得 
                $skillData = $this->Card->getCardData($userCard['card_id']);
                // スキル実行
                $this->Battle->doSkill($skillData, $key, $userCards, $targetCards);
            }
        }

        // 防御側のスキル発動
        foreach ($targetCards as $key => $val) {
            $userCard = $val['UserCard'];
            mt_srand();
            $hit = mt_rand(1, 100);
            // 当選
            if ($hit <= $userCard['skill_level']) {
                // カードのスキル取得 
                $skillData = $this->Card->getCardData($userCard['card_id']);

                // スキル実行
                $this->Battle->doSkill($skillData, $key, $userCards, $targetCards);
            }
        }

        // 1:攻撃側勝利 2:防御側勝利
        $winner = 1;
        $turn = 0;
        $battleLog = array();
        while(true) {
            $targetCards = $this->Battle->doBattle($userCards, $targetCards, $battleLog[$turn]);
            if (empty($targetCards)) break;
            $turn++;

            $userCards = $this->Battle->doBattle($targetCards, $userCards, $battleLog[$turn]);
            if (empty($userCards)) {
                $winner = 2;
                break;
            }
            $turn++;
        }

        $this->rd('user_params', 'product');
    }

    /**
     * バトル演出
     *
     * @author imanishi
     * @return void
     */
    public function product() {

    }

    /**
     * バトル完了
     *
     * @author imanishi
     * @return void
     */
    public function comp() {

        $data = $this->BattleLog->getBattleLogDataLatest($this->userId);
        $this->set('data', $data);
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
            $list = $this->UserParam->getAllFind($this->request->query, $fields);
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

            if ($this->UserParam->save($this->request->query)) {
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
