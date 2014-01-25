<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'carrer' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'comment' => '1.android 2.iphone'),
		'delete_flg' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'created_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			
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
			'name' => 'Lorem ipsum dolor sit amet',
			'carrer' => 1,
			'delete_flg' => 1,
			'created_at' => '2014-01-26 08:39:56',
			'updated_at' => '2014-01-26 08:39:56'
		),
	);

}
