<?php
App::uses('AppModel', 'Model');
/**
 * UserBaseCard Model
 *
 * @property User $User
 * @property UserCard $UserCard
 */
class UserBaseCard extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';


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
		'UserCard' => array(
			'className' => 'UserCard',
			'foreignKey' => 'user_card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * ユーザのベースカード情報を取得
     *
     * @author imanishi
     * @param int $userId
     * @param array $data ベースカードデータ
     * @return array $data
     */
    public function getUserBaseCardData ($userId) {

        $where = array('UserBaseCard.user_id' => $userId);
        $field = array();
        $recurcive = -1;

        $joins = array(
            array('table' => 'user_cards',
                'alias' => 'UserCard',
                'type' => 'inner',
                'conditions' => array(
                    'UserBaseCard.user_card_id = UserCard.user_card_id',
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
                'type' => 'LEFT',
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
        $field = array('*');
        $data = $this->getAllFind($where, $field, 'first', array(), 0, 0, $recurcive, $joins);
        return $data;
    }
}
