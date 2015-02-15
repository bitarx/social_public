<?php
App::uses('AppModel', 'Model');
/**
 * TmpSendMe Model
 *
 */
class TmpSendMe extends AppModel {

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
		'sns_user_id' => array(
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

   public function getList () {
       $field = array('sns_user_id');
       $list = $this->getAllFind($where = array(), $field);
       return $list;
   }

}
