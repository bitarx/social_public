<?php
/**
 * RaidFixture
 *
 */
class RaidFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'レイドイベント名', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'start_time' => '2014-02-08 09:55:27',
			'end_time' => '2014-02-08 09:55:27',
			'delete_flg' => 1
		),
	);

}
