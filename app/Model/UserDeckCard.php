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
		'deck_number' => array(
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
     * ユーザデッキ情報取得
     *
     * @author imanishi
     * @param int $userId
     */
    public function getUserDeckData ($userId, $kind = 1) {

        $joins = array(
            array('table' => 'user_decks',
                'alias' => 'UserDeck',
                'type' => 'inner',
                'conditions' => array(
                    'UserDeck.user_deck_id = UserDeckCard.user_deck_id',
                ),
            ),
            array('table' => 'user_cards',
                'alias' => 'UserCard',
                'type' => 'inner',
                'conditions' => array(
                    'UserDeckCard.user_card_id = UserCard.user_card_id',
                ),
            ),
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
            /*
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
            */
        );
        $where = array(
           'UserDeck.user_id' => $userId
        ,  'UserDeck.kind' => $kind
        );
        $order = array('UserDeckCard.deck_number ASC');
        $field = array('*');
        
        $data = $this->getAllFind($where, $field, 'all', $order, 0, 0, $recu = -1, $joins);

        return $data;
    }

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
