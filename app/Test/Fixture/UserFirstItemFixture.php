<?php
/**
 * UserFirstItemFixture
 *
 */
class UserFirstItemFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_first_item';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_first_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'unique'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_first_item_id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 1)
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
			'user_first_item_id' => 1,
			'user_id' => 1,
			'delete_flg' => 1,
			'created' => '2014-11-02 09:54:46'
		),
	);

}
