<?php
/**
 * FriendInvitePresentFixture
 *
 */
class FriendInvitePresentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'friend_invite_present_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '対象のID'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '数量'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'friend_invite_present_id', 'unique' => 1)
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
			'friend_invite_present_id' => 1,
			'point' => 1,
			'kind' => 1,
			'target' => 1,
			'num' => 1,
			'delete_flg' => 1
		),
	);

}
