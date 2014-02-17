<?php
/**
 * RankEvRaidFixture
 *
 */
class RankEvRaidFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'rank_ev_raid';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'rank_ev_raid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'rank' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '順位'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'unit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'ポイントの単位', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'rank_ev_raid_id', 'unique' => 1),
			'FK_rank_raid_event_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
	);

}
