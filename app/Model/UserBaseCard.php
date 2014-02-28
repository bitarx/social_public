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

        $where = array('user_id' => $userId);
        $field = array();
        $data = $this->getAllFind($where, $field, 'first');
        return $data;
    }
}
