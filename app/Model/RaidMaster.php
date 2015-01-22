<?php
App::uses('AppModel', 'Model');
/**
 * RaidMaster Model
 *
 * @property User $User
 * @property Enemy $Enemy
 * @property RaidDamage $RaidDamage
 */
class RaidMaster extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'raid_master_id';


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
		'Enemy' => array(
			'className' => 'Enemy',
			'foreignKey' => 'enemy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'RaidDamage' => array(
			'className' => 'RaidDamage',
			'foreignKey' => 'raid_master_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
