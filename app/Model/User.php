<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property OpensosialOwner $OpensosialOwner
 */
class User extends AppModel {

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
		'OpensosialOwner' => array(
			'className' => 'OpensosialOwner',
			'foreignKey' => 'opensosial_owner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
