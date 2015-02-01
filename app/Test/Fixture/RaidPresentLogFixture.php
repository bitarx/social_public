<?php
/**
 * RaidPresentLogFixture
 *
 */
class RaidPresentLogFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'raid_present_log';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'raid_master_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => '',
			'user_id' => 1,
			'raid_master_id' => 1,
			'kind' => 1,
			'target' => 1,
			'delete_flg' => 1,
			'created' => '2015-01-25 20:42:08'
		),
	);

}
