<?php
App::uses('AppModel', 'Model');
/**
 * UserDeckCard Model
 *
 * @property Card $Card
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
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * デッキ登録
     *
     * @author imanishi
     * @param int $userDeckId
     * @param array $list カードデータ
     * @return bool
     */
    public function regist ($userDeckId, $list) {

        $fields = array('user_deck_id', 'user_card_id');
        $data = array();
        foreach ($list as $val) {
            $data[] = array($userDeckId, $val['user_card_id']);
        }
        return $this->insertBulk($fields, $data);
    }
}
