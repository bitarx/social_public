<?php
App::uses('AppModel', 'Model');
/**
 * UserFirstItem Model
 *
 */
class UserFirstItem extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_first_items';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_first_item_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_first_item_id' => array(
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
}
