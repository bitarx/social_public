<?php
App::uses('AppModel', 'Model');
App::uses('Skill', 'Model');
/**
 * Card Model
 *
 * @property Skill $Skill
 */
class Card extends AppModel {


    // 初期配布カードID
    public $startCardIds = array( 13, 37, 43, 46, 55  );

    // 初期特典配布カードID
    public $startSpecialCardIds = array( 64, 65, 66 );

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'card_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'card_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'height' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'weight' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'size' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blood' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rare_level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'attr' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_hp' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_atk' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_def' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'skill_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_words' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_detail' => array(
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
		'Skill' => array(
			'className' => 'Skill',
			'foreignKey' => 'skill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);


    /**
     * カードデータ取得
     *
     * @author imanishi
     * @param int カードID
     * @return array 指定レコード
     */
     public function getCardData($id) {

         $where = array('card_id' => $id);
         $row = $this->getAllFind($where, array(), 'first');
         return $row;
     }

    /**
     * 初期カードデータ取得
     *
     * @author imanishi
     * @return array 指定レコード
     */
     public function getStartCardList() {

         $where = array('card_id' => $this->startCardIds);
         $order = array('card_id ASC');
         $list = $this->getAllFind($where, array(), 'all', $order);

         return $list;
     }

    /**
     * 初期特典カードデータ取得
     *
     * @author imanishi
     * @return array 指定レコード
     */
     public function getStartSpecialCardList() {

         $where = array('card_id' => $this->startSpecialCardIds);
         $order = array('card_id ASC');
         $list = $this->getAllFind($where, array(), 'all', $order);

         return $list;
     }

    /**
     * 取得済みカードリスト取得
     *
     * @param int $userId
     *
     *
     */
    public function getCardListWithCollect ($userId,$order, $offset, &$pageAll) {

        $field = array('Card.card_id', 'Card.card_name', 'Card.card_title', 'Card.rare_level', 'Card.attr', 'Card.card_hp', 'Card.card_atk', 'Card.card_def','UserCollect.new_flg' ,'UserCollect.created');
        $where = array('UserCollect.user_id' => $userId);
        $where = array();
        $limit = PAGE_LIMIT;

        $joins = array(
            array('table' => 'user_collects',
                'alias' => 'UserCollect',
                'type' => 'left',
                'conditions' => array(
                    'UserCollect.user_id = ' . $userId,
                    'Card.card_id = UserCollect.card_id',
                ),
            ),
        );

        $recursive = -1;


        $all = $this->getAllFind($where, $field, $kind = 'all', $order, $lm = 0, $of = 0, $recursive , $joins);

        $pageAll = ceil(count($all) / PAGE_LIMIT);

        $list = $this->getAllFind($where, $field, $kind = 'all', $order, $limit, $offset, $recursive , $joins);
        return $list;
    }
}
