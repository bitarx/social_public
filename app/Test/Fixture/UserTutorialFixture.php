<?php
/**
 * UserTutorialFixture
 *
 */
class UserTutorialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'end_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK__mst_tutorials' => array('column' => 'tutorial_id', 'unique' => 0),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'tutorial_id' => 1,
			'end_flg' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-08 09:55:34',
			'modified' => '2014-02-08 09:55:34'
		),
	);

}
