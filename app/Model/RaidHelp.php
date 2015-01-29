<?php
App::uses('AppModel', 'Model');
/**
 * RaidHelp Model
 *
 */
class RaidHelp extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'raid_help_id';

    public function regist ($values) {

        $fields = array('user_id', 'target', 'raid_master_id', 'kind');
        return $this->insertBulk ($fields, $values) ;
    }

    /**
     * レイドマスタIDよりレコードを取得
     *
     * @param int $userId
     * @param int $raidMasterId
     * @return array レコード
     */
    public function getDataByRaidMasterId ($userId, $raidMasterId) {
        $where = array(
            'target' => $userId
        ,   'raid_master_id' => $raidMasterId 
        );
        $field = array();
        $data = $this->getAllFind($where, $field, 'first');
        return $data;
    }

    /**
     * 救援要請一覧を取得
     *
     * @param int userId
     * @return array 要請一覧
     */
    public function getHelpList ($userId, $limit = 5, $offset = 0) {

        $recu = -1;

        $joins = array(
            array('table' => 'users',
                'alias' => 'User',
                'type' => 'inner',
                'conditions' => array(
                    'RaidHelp.user_id = User.user_id',
                ),
            ),
            array('table' => 'user_base_cards',
                'alias' => 'UserBaseCard',
                'type' => 'left',
                'conditions' => array(
                    'User.user_id = UserBaseCard.user_id',
                ),
            ),
            array('table' => 'user_cards',
                'alias' => 'UserCard',
                'type' => 'left',
                'conditions' => array(
                    'UserBaseCard.user_card_id = UserCard.user_card_id',
                ),
            ),
            array('table' => 'raid_masters',
                'alias' => 'RaidMaster',
                'type' => 'inner',
                'conditions' => array(
                    'RaidMaster.raid_master_id = RaidHelp.raid_master_id',
                ),
            ),
            array('table' => 'enemys',
                'alias' => 'Enemy',
                'type' => 'inner',
                'conditions' => array(
                    'RaidMaster.enemy_id = Enemy.enemy_id',
                )
            )
        );

        $where = array(
            'target' => $userId
        ,   'RaidMaster.hp > '  => 0
        ,   'RaidMaster.end_time > ' => $this->nowDate()
        );
        $field = array('RaidHelp.user_id', 'User.user_name', 'RaidMaster.raid_master_id', 'RaidMaster.enemy_id'
                        , 'RaidMaster.level', 'RaidMaster.end_time', 'Enemy.card_name'
                        , 'UserCard.card_id');
        $order = array('RaidHelp.created DESC');

        $list = $this->getAllFind($where, $field, 'all', $order, $limit, $offset, $recu, $joins);

        return $list;
    }

    /**
     * データ取得
     *
     * @param int raidHelpId
     * @param int userId
     * @return array 要請一覧
     */
    public function getDataWithMster ($raidHelpId, $userId) {

        $limit = 1;
        $offset = 0;
        $order = array();

        $joins = array(
            array('table' => 'raid_masters',
                'alias' => 'RaidMaster',
                'type' => 'inner',
                'conditions' => array(
                    'RaidHelp.raid_master_id = RaidMaster.raid_master_id',
                ),
            )
        );

        $where = array(
            'RaidHelp.raid_help_id' => $raidHelpId
        ,   'RaidHelp.target'       => $userId
        ,   'RaidMaster.end_time > '  => $this->nowDate()
        );

        $field = array('user_id', 'raid_master_id');

        $data = $this->getAllFind($where, $field, 'first', $order, $limit, $offset, $this->recursive, $joins);

        return $data;
    }
}
