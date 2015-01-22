<?php
/**
 * RaidMasterFixture
 *
 */
class RaidMasterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'raid_master_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index', 'comment' => '発見者のuser_id'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null, 'comment' => '終了時刻'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'raid_master_id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'enemy_id' => array('column' => 'enemy_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'raid_master_id' => 1,
			'user_id' => 1,
			'enemy_id' => 1,
			'end_time' => '2015-01-22 13:16:58',
			'delete_flg' => 1,
			'created' => '2015-01-22 13:16:58',
			'modified' => '2015-01-22 13:16:58'
		),
	);

}
