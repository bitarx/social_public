<?php
/**
 * FriendInviteFixture
 *
 */
class FriendInviteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'friend_invite_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => '招待した人のuser_Id'),
		'invite_sns_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => '招待された人のsnsId'),
		'point1_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'point2_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'friend_invite_id', 'unique' => 1)
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
			'friend_invite_id' => 1,
			'user_id' => 1,
			'invite_sns_user_id' => 1,
			'point1_flg' => 1,
			'point2_flg' => 1,
			'delete_flg' => 1,
			'created' => '2014-12-31 19:28:30',
			'modified' => '2014-12-31 19:28:30'
		),
	);

}
