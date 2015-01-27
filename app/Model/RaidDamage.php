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

    /**
     * 参加者一覧を取得
     *
     * @param int raid_master_id
     * @return array 参加者一覧
     */
    public function getAddDamageList($raidMasterId) {
        $where = array(
            'RaidDamage.raid_master_id' => $raidMasterId
        ,   'damage > ' => 0     
        ); 
        $fields = array('DISTINCT RaidDamage.user_id');
        $list = $this->getAllFind($where, $fields, 'all');
        return $list;
    }

    /**
     * 交戦中一覧を取得
     *
     * @param int $userId
     * @return array 交戦中レイドボス一覧
     */
    public function getRaidList($userId) {

        $where = array(
            'RaidDamage.user_id'       => $userId
        ,   'RaidDamage.damage > '     => 0
        ,   'RaidMaster.hp > '         => 0
        ,   'RaidMaster.end_time > '   => $this->nowDate()
        );
        $list = $this->getAllFind($where);

        return $list;
    }
}
