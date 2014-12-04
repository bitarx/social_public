<?php
/**
 * UserCollectFixture
 *
 */
class UserCollectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'new_flg' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 3, 'comment' => '閲覧すれば0'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'card_id'), 'unique' => 1),
			'FK_user_collects_cards' => array('column' => 'card_id', 'unique' => 0)
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
			'card_id' => 1,
			'new_flg' => 1,
			'delete_flg' => 1,
			'created' => '2014-12-04 19:27:20',
			'modified' => '2014-12-04 19:27:20'
		),
	);

}
