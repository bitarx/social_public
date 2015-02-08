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
    public function getRaidList($userId, $limit = PAGE_LIMIT, $offset, &$pageAll = 0) {

        $where = array(
            'RaidDamage.user_id'       => $userId
        ,   'RaidMaster.hp > '         => 0
        ,   'RaidMaster.end_time > '   => $this->nowDate()
        );
        $field = array('DISTINCT RaidMaster.raid_master_id', 'RaidMaster.user_id', 'RaidMaster.enemy_id', 'RaidMaster.level'
                       , 'RaidMaster.hp', 'RaidMaster.raid_stage_id', 'RaidMaster.end_time');
        $order = array('RaidMaster.created DESC');
        $kind = 'all';
        $list = $this->getAllFind($where, $field, $kind, $order, $limit, $offset);
        if (!empty($pageAll)) {
            $tmp = $this->getAllFind($where, $field, $kind); 
            $pageAll = ceil(count($tmp) / $limit);
        }
        return $list;
    }

    /**
     * 救援してくれた人一覧を取得
     *
     * @param int $userId
     * @return array 一覧
     */
    public function getHelpSelfList($userId, $limit = PAGE_LIMIT, $offset, &$pageAll = 0) {

        $where = array(
            'RaidMaster.user_id'       => $userId
        ,   'RaidDamage.user_id != '   => $userId
        );
        $field = array('RaidMaster.raid_master_id', 'RaidMaster.enemy_id', 'RaidMaster.level'
                       , 'RaidMaster.hp', 'RaidMaster.raid_stage_id', 'RaidMaster.end_time'
                       , 'RaidDamage.user_id', 'RaidDamage.damage', 'RaidDamage.created');
        $order = array('RaidDamage.created DESC');
        $kind = 'all';
        $list = $this->getAllFind($where, $field, $kind, $order, $limit, $offset);

        if (!empty($pageAll)) {
            $field = array('RaidDamage.user_id');
            $tmp = $this->getAllFind($where, $field, $kind); 
            $pageAll = ceil(count($tmp) / $limit);
        }

        return $list;
    }

    /**
     * 最新データ１件取得
     *
     * @param $userId
     * @return array 最新データ
     */
    public function getLatestData($userId){
        $field = array();
        $where = array(
            'user_id' => $userId
        );
        $order = array('RaidDamage.created DESC');
        $limit = 1;
        $data = $this->getAllFind($where, $field, 'first', $order, $limit);

        return $data;
    }
}
