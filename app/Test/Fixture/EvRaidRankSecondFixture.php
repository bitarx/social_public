<?php
/**
 * EvRaidRankSecondFixture
 *
 */
class EvRaidRankSecondFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ev_raid_rank' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'unique'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 1)
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
			'id' => 1,
			'ev_raid_rank' => 1,
			'user_id' => 1,
			'point' => 1,
			'delete_flg' => 1,
			'created' => '2015-03-06 09:20:47'
		),
	);

}
