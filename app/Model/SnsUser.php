<?php
App::uses('AppModel', 'Model');
/**
 * SnsUser Model
 *
 */
class SnsUser extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'sns_user_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'viewer' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sns_name' => array(
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

    /**
     * 名前を取得
     *
     * @author imanishi 
     * @param int ownerId
     * @return str ユーザ名 
     */
    public function getUserName($ownerId) { 
        $where = array(
            'sns_user_id' => $ownerId
        ,   'delete_flg'  => 0 
        );
        $name = $this->field('sns_name', $where);
        return $name;
    } 
}
