<?php
/**
 * RaidUserEnemyCntFixture
 *
 */
class RaidUserEnemyCntFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'raid_user_enemy_cnt';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'cnt' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'レイドボス討伐数'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'integer', 'null' => false, 'default' => null),
		'updated' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'enemy_id'), 'unique' => 1),
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
			'user_id' => 1,
			'enemy_id' => 1,
			'cnt' => 1,
			'delete_flg' => 1,
			'created' => 1,
			'updated' => 1
		),
	);

}
