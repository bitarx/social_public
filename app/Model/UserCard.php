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
     * @param array $data 所持カードデータ
     * @return array $list
     */
    public function getUserCard ($userId, $cardId = 0, $userCardId = 0) {

        $where = array('user_id' => $userId);
        if (!empty($cardId)) { 
            $where['card_id'] = $cardId;
        } 
        if (!empty($userCardId)) { 
            $where['NOT'] =  array('user_card_id' => $userCardId); 
        } 
        $list = $this->getAllFind($where, $fields = array(), $kind = 'all', $order = array(), $limit = 0, $offset = 0, $recursive = 3);
        return $list;
    }

    /**
     * 取得カードを登録
     *
     * @author imanishi 
     * @param int $userId
     * @param int $cardId
     * @param int $num 登録枚数
     * @param array $row 対象カード情報(参照用)
     e @return bool 
     */
    public function registCard($userId, $cardId, $num, &$row) {

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


}
