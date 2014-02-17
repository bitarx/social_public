<?php
/**
 * UserRaidLogFixture
 *
 */
class UserRaidLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => '攻撃者'),
		'user_raid_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => '対象のレイドボス'),
		'damage' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '与えたダメージ合計'),
		'win_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:とどめをさした場合'),
		'log' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_raid_logs_users' => array('column' => 'user_id', 'unique' => 0),
			'FK_user_raid_logs_user_raids' => array('column' => 'user_raid_id', 'unique' => 0)
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
			'user_id' => 1,
			'user_raid_id' => 1,
			'damage' => 1,
			'win_flg' => 1,
			'log' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'delete_flg' => 1,
			'created' => '2014-02-17 19:26:00',
			'updated' => '2014-02-17 19:26:00'
		),
	);

}
