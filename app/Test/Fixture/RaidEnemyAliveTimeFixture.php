<?php
/**
 * RaidEnemyAliveTimeFixture
 *
 */
class RaidEnemyAliveTimeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'raid_enemy_alive_time';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'alive_time' => array('type' => 'time', 'null' => false, 'default' => '02:00:00', 'comment' => '生存時間'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'enemy_id', 'unique' => 1)
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
			'enemy_id' => 1,
			'alive_time' => '10:46:14',
			'delete_flg' => 1,
			'created' => '2015-01-24 10:46:14'
		),
	);

}
