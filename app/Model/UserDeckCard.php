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
     * ユーザデッキ情報取得(1レコード)
     *
     * @author imanishi
     * @param int $userId
     */
    public function getUserDeckDataByNumber ($userId, $userDeckId , $deckNumber) {

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
                'type' => 'left',
                'conditions' => array(
                    'UserDeckCard.user_card_id = UserCard.user_card_id',
                ),
            ),
            array('table' => 'cards',
                'alias' => 'Card',
                'type' => 'left',
                'conditions' => array(
                    'UserCard.card_id = Card.card_id',
                ),
            ),
            array('table' => 'skills',
                'alias' => 'Skill',
                'type' => 'left',
                'conditions' => array(
                    'Card.skill_id = Skill.skill_id',
                ),
            ),
        );
        $where = array(
           'UserDeck.user_id' => $userId
        ,  'UserDeckCard.user_deck_id' => $userDeckId
        ,  'UserDeckCard.deck_number' => $deckNumber
        );
        $order = array();
        $field = array('*');
        
        $data = $this->getAllFind($where, $field, 'first', $order, 0, 0, $recu = -1, $joins);

        return $data;
    }


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
                'type' => 'left',
                'conditions' => array(
                    'UserDeckCard.user_card_id = UserCard.user_card_id',
                ),
            ),
            array('table' => 'cards',
                'alias' => 'Card',
                'type' => 'left',
                'conditions' => array(
                    'UserCard.card_id = Card.card_id',
                ),
            ),
            array('table' => 'card_groups',
                'alias' => 'CardGroup',
                'type' => 'left',
                'conditions' => array(
                    'Card.card_id = CardGroup.card_id',
                ),
            ),
            array('table' => 'skills',
                'alias' => 'Skill',
                'type' => 'left',
                'conditions' => array(
                    'Card.skill_id = Skill.skill_id',
                ),
            ),
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
     * ユーザデッキコスト取得
     *
     * @author imanishi
     * @param int $userId
     */
    public function getCost ($userId, $kind = 1) {

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
                'type' => 'left',
                'conditions' => array(
                    'UserDeckCard.user_card_id = UserCard.user_card_id',
                ),
            ),
            array('table' => 'cards',
                'alias' => 'Card',
                'type' => 'left',
                'conditions' => array(
                    'UserCard.card_id = Card.card_id',
                ),
            ),
            array('table' => 'skills',
                'alias' => 'Skill',
                'type' => 'left',
                'conditions' => array(
                    'Card.skill_id = Skill.skill_id',
                ),
            ),
        );
        $where = array(
           'UserDeck.user_id' => $userId
        ,  'UserDeck.kind' => $kind
        );
        $order = array();
        $field = array('Card.card_cost');
        
        $list = $this->getAllFind($where, $field, 'all', $order, 0, 0, $recu = -1, $joins);
        $cost = 0;
        foreach ($list as $val) {
            $cost += $val['card_cost'];
        }

        return $cost;
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
        $num = 1;
        foreach ($list as $val) {
            $data[] = array($userDeckId, $num , $val['user_card_id']);
            $num++;
        }
        $fields = array('user_deck_id', 'deck_number' ,'user_card_id'); 
        $ret = $this->insertBulk( $fields, $data, $ignoreFlg = 1 );

        return $ret;
    }

    /**
     * 対象のカードがデッキに存在するか確認 
     *
     * @param int $userCardId
     * @return bool 存在すればtrue
     */
    public function isDeck($userCardId) {

        $where = array('user_card_id' => $userCardId);
        $field = array('user_deck_id');
        $ret = $this->getAllFind($where, $field, 'first');
        $return = empty($ret) ? false : true;
        return $return;
    }
}
