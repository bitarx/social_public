<?php
App::uses('AppModel', 'Model');
App::uses('Card', 'Model');
/**
 * UserDeck Model
 *
 * @property UserDeck $UserDeck
 * @property User $User
 * @property UserDeckCard $UserDeckCard
 * @property UserDeck $UserDeck
 */
class UserDeck extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_deck_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_deck_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'kind' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_deck_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UserDeckCard' => array(
			'className' => 'UserDeckCard',
			'foreignKey' => 'user_deck_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);


    /**
     * ユーザデッキ情報取得
     *
     * @author imanishi
     * @param int $userId
     * @param int $kind 1:攻撃 2:防御
     * @return array $data
     */
    public function getUserDeckData ($userId, $kind = 1) {

        $where = array(
            'user_id' => $userId
       ,    'kind' => $kind     
        );
        $field = array();
        $data = $this->getAllFind($where, $field, 'first', array(), 0, 0, $recu = 1);
        return $data;
    }
}
