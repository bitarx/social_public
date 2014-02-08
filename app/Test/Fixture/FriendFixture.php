<?php
/**
 * FriendFixture
 *
 */
class FriendFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'friend_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'user_id2人を結ぶ'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:申請 2:申請取下 3:拒否 4:承認済'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'friend_id' => array('column' => array('friend_id', 'user_id'), 'unique' => 0),
			'FK_friends_users' => array('column' => 'user_id', 'unique' => 0)
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
			'friend_id' => 1,
			'user_id' => 1,
			'state' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-08 09:55:25',
			'modified' => '2014-02-08 09:55:25'
		),
	);

}
