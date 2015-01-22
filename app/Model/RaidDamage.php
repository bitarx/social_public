<?php
App::uses('AppModel', 'Model');
/**
 * RaidDamage Model
 *
 * @property RaidDamage $RaidDamage
 * @property User $User
 * @property RaidMaster $RaidMaster
 */
class RaidDamage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'raid_damage_id';


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
		'RaidMaster' => array(
			'className' => 'RaidMaster',
			'foreignKey' => 'raid_master_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
