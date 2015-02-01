<?php
/**
 * RaidDamageFixture
 *
 */
class RaidDamageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'raid_damage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index', 'comment' => '参加(攻撃)者のuser_id'),
		'raid_master_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'damage' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'comment' => '与えたダメージ'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'raid_damage_id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'raid_master_id' => array('column' => 'raid_master_id', 'unique' => 0)
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
			'raid_damage_id' => 1,
			'user_id' => 1,
			'raid_master_id' => 1,
			'damage' => 1,
			'delete_flg' => 1,
			'created' => 1
		),
	);

}
