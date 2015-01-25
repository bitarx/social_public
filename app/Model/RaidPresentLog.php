<?php
App::uses('AppModel', 'Model');
/**
 * RaidPresentLog Model
 *
 * @property User $User
 * @property RaidMaster $RaidMaster
 */
class RaidPresentLog extends AppModel {



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

    public function regist($values) {
        $fields = array('user_id', 'raid_master_id', 'kind', 'target', 'num');
        return $this->insertBulk($fields, $values);
    }
}
