<?php
/**
 * UserItemFixture
 *
 */
class UserItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '所持個数'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => array('user_id', 'item_id'), 'unique' => 1),
			'FK_user_items_items' => array('column' => 'item_id', 'unique' => 0)
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
			'item_id' => 1,
			'num' => 1,
			'delete_flg' => 1,
			'created' => '2014-03-23 06:45:17',
			'updated' => '2014-03-23 06:45:17'
		),
	);

}
