<?php
/**
 * UserRaidFixture
 *
 */
class UserRaidFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary', 'comment' => '発見者'),
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index', 'comment' => 'レイドイベントID'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'comment' => '対象の残りHP'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'user_raid_id' => array('column' => array('user_id', 'raid_id'), 'unique' => 0),
			'FK_user_raids_raids' => array('column' => 'raid_id', 'unique' => 0),
			'FK_user_raids_enemys' => array('column' => 'enemy_id', 'unique' => 0)
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
			'raid_id' => 1,
			'enemy_id' => 1,
			'hp' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-10 09:47:45',
			'updated' => '2014-02-10 09:47:45'
		),
	);

}
