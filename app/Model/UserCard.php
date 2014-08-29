<?php
App::uses('AppModel', 'Model');
App::uses('Card', 'Model');
/**
 * UserCard Model
 *
 * @property User $User
 * @property Card $Card
 */
class UserCard extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_card_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'atk' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'def' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'exp' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'skill_level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'skill_exp' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delete_flg' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * 初回カード登録
     *
     * @author imanishi
     * @param int $userId
     * @param array $list カードデータ
     * @return bool
     */
    public function registStartCard ($userId, $list) {

        $data = array();
        foreach ($list as $val) {
            $data[] = array($userId, $val['card_id'], $val['card_atk'], $val['card_def']);
        }
        $fields = array('user_id', 'card_id', 'atk', 'def');
        return $this->insertBulk($fields, $data);
    }

    /**
     * 所持カードデータ取得
     *
     * @author imanishi
     * @param int $userId
     * @param int $cardId
     * @param int $userCardId このカードを除く
     * @param int $limit
     * @param int $offset
     * @param int $evolGroup 進化グループ
     * @param int $pageAll ページ数
     * @param int $notIn NOT IN
     * @param array $data 所持カードデータ
     * @return array $list
     */
    public function getUserCard ($userId, $cardId = 0, $userCardId = 0, $limit = PAGE_LIMIT, $offset = 0, $rareLevel = 0, $sortItem = 0, $evolGroup = 0, &$pageAll = 0, $notIn = array()) {

        $joins = array();

        if ($offset < 0) $offset = 0;

        $where = array('user_id' => $userId);
        if (!empty($cardId)) { 
            $where['card_id'] = $cardId;
        } 
        if (!empty($userCardId)) { 
            $where['NOT'] =  array('user_card_id' => $userCardId); 
        } 

        // 進化グループ
        if (!empty($evolGroup)) {
            $joins = array(
                array('table' => 'cards',
                    'alias' => 'Card',
                    'type' => 'inner',
                    'conditions' => array(
                        'UserCard.card_id = Card.card_id',
                    ),
                ),
                array('table' => 'skills',
                    'alias' => 'Skill',
                    'type' => 'inner',
                    'conditions' => array(
                        'Card.skill_id = Skill.skill_id',
                    ),
                ),
                array('table' => 'card_groups',
                    'alias' => 'CardGroup',
                    'type' => 'inner',
                    'conditions' => array(
                        'Card.card_id = CardGroup.card_id',
                    )
                )
            );
            $where['CardGroup.evol_group'] = $evolGroup; 
            $recursive = -1;
        } else {
            $recursive = 2;
        }

        // NOT IN
        if (!empty($notIn)) {
            $where['NOT'] = $notIn;
        }

        // レア度絞り込み
        if (!empty($rareLevel)) {
            $where['Card.rare_level <='] = $rareLevel;
        }

        // ソート
        $order = $this->makeSort($sortItem);

        $list = $this->getAllFind($where, $fields = array('*'), $kind = 'all', $order, $limit, $offset, $recursive , $joins);

        // ページング用に全ページ数カウント
        $all = $this->getAllFind($where, $fields = array('user_card_id'), $kind = 'all', $order = array(), $limit = 0, $offset = 0, $recursive = -1, $joins);

        $allCnt = count($all);
        $pageCnt = $allCnt / PAGE_LIMIT;
        $pageAll = ceil($pageCnt);

        return $list;
    }

    /**
     * ソートのorder区を生成
     *
     * return array ORDERBY区
     */
    public function makeSort($sortItem) {

        $order = array(); 

        switch ($sortItem) {
            // 追加された順
            case 0:
                $order = array('user_card_id DESC');
                break;
            // 古い順
            case 1:
                $order = array('user_card_id ASC');
                break;
            // レアリティ高い順
            case 2:
                $order = array('Card.rare_level DESC');
                break;
            // レアリティ低い順
            case 3:
                $order = array('Card.rare_level ASC');
                break;
            // Lv高い順 
            case 4:
                $order = array('level DESC');
                break;
            // Lv低い順 
            case 5:
                $order = array('level ASC');
                break;
            // 攻撃力高い順 
            case 6:
                $order = array('atk DESC');
                break;
            // 攻撃力低い順 
            case 7:
                $order = array('def ASC');
                break;
            // 防御力高い順 
            case 8:
                $order = array('def DESC');
                break;
            // 防御力低い順 
            case 9:
                $order = array('def ASC');
                break;
        }
        return $order;
    }

    /**
     * 論理削除含む所有カードを取得
     *
     * @author imanishi 
     * @param int $userId
     * @param int $cardId
     * @return array データ 
     */
    public function getUserCardWithDeleteFlg($userId, $cardId) { 
        $where = array(
            'user_id'    => $userId
        ,   'card_id'    => $cardId
        ,   $this->_filDelFlg => array(0, 1)
        );
        $data = $this->getAllFind($where, $field = array(), 'first'); 
        return $data;
    } 

    /**
     * 所有カード枚数取得
     *
     * @author imanishi 
     * @param int $userId
     * @param int $cardId
     * @return array データ 
     */
    public function getUserCardCnt($userId) { 

        $where = array('user_id' => $userId); 
        $fields = array('user_card_id'); 

        $list = $this->getAllFind( $where, $fields, $kind = 'all', $order = array(), $limit = 0, $offset = 0, $recursive = -1);

        $cnt = count($list);

        return $cnt;
    } 

    /**
     * 取得カードを登録
     *
     * @author imanishi 
     * @param int $userId
     * @param int $cardId
     * @param int $num 登録枚数
     * @param array $row 対象カード情報(参照用)
     * @return bool 
     */
    public function registCard($userId, $cardId, $num = 1, &$row) {

        $card = new Card();
        $where = array('card_id' => $cardId);
        $fields = array('card_id', 'card_name', 'card_atk' , 'card_def');
        $row = $card->getAllFind($where, $fields, 'first');
        for ($i = 0; $i < $num; $i++) {
            $data[] = array($userId, $cardId, $row['card_atk'], $row['card_def']);
        }

        $fields = array('user_id', 'card_id', 'atk', 'def');
        $ret = $this->insertBulk($fields, $data);
        return $ret;
    }

    /**
     * ユーザの保有カード情報をuserCardIdで取得
     *
     * @author imanishi
     * @param int $userCardId
     * @param int $userId
     * @param array $data 所持カードデータ
     * @return array $data
     */
    public function getUserCardById ($userCardId, $userId = 0) {

        $where = array('user_card_id' => $userCardId);
        if (!empty($userId)) { 
            $where['user_id'] = $userId;
        } 
        $field = array();
        $data = $this->getAllFind($where, $field, 'first', $order = array(), $limit = 0, $offset = 0, $recursive = 3);
        return $data;
    }

    /**
     * ユーザの保有カード情報最新レコードを取得
     *
     * @author imanishi
     * @param int $cardId
     * @param int $userId
     * @return array $data
     */
    public function getUserCardLatest ($cardId, $userId = 0) {

        $where = array('card_id' => $cardId);
        if (!empty($userId)) { 
            $where['user_id'] = $userId;
        } 
        $field = array();
        $order = array('UserCard.created DESC');
        $data = $this->getAllFind($where, $field, 'first', $order, $limit = 1, $offset = 0, $recursive = 3);
        return $data;
    }


}
