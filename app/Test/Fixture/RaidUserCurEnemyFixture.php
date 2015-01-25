<?php
/**
 * RaidUserCurEnemyFixture
 *
 */
class RaidUserCurEnemyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'raid_user_cur_enemys';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
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
			'user_id' => 1,
			'enemy_id' => 1,
			'delete_flg' => 1,
			'created' => '2015-01-23 17:18:11',
			'modified' => '2015-01-23 17:18:11'
		),
	);

}
