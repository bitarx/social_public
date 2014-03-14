<?php
App::uses('AppModel', 'Model');
/**
 * UserDeckCard Model
 *
 * @property UserDeck $UserDeck
 * @property UserCard $UserCard
 */
class UserDeckCard extends AppModel {

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
		'user_card_id' => array(
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
		'UserDeck' => array(
			'className' => 'UserDeck',
			'foreignKey' => 'user_deck_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserCard' => array(
			'className' => 'UserCard',
			'foreignKey' => 'user_card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * デッキ登録
     *
     * @author imanishi 
     * @param int $userDeckId ユーザデッキID
     * @param array $list ユーザカードIDのあるリスト
     * @return bool
     */
    public function regist($userDeckId, $list) {

        $data = array();
        foreach ($list as $val) {
            $data[] = array($userDeckId, $val['user_card_id']);
        }
        $fields = array('user_deck_id', 'user_card_id'); 
        $ret = $this->insertBulk( $fields, $data, $ignoreFlg = 1 );

        return $ret;
    }
}
