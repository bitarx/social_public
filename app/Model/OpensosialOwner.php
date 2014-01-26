<?php
App::uses('AppModel', 'Model');
/**
 * OpensosialOwner Model
 *
 * @property Viewer $Viewer
 */
class OpensosialOwner extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'opensosial_owner_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'viewer_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sne_name' => array(
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
		'Viewer' => array(
			'className' => 'Viewer',
			'foreignKey' => 'viewer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
