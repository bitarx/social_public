<?php
/**
 * RaidHelpFixture
 *
 */
class RaidHelpFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'raid_help_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index', 'comment' => '救援依頼者'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index', 'comment' => '救援依頼されたユーザID'),
		'raid_master_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'raid_help_id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'target' => array('column' => 'target', 'unique' => 0),
			'end_time' => array('column' => 'end_time', 'unique' => 0)
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
			'raid_help_id' => '',
			'user_id' => 1,
			'target' => 1,
			'raid_master_id' => 1,
			'end_time' => '2015-01-28 10:38:03',
			'delete_flg' => 1,
			'created' => '2015-01-28 10:38:03'
		),
	);

}
