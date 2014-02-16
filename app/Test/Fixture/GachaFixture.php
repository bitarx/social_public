<?php
/**
 * GachaFixture
 *
 */
class GachaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => '3000-01-01 00:00:00'),
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
			'id' => '1',
			'name' => 'ノーマルガチャ',
			'detail' => '',
			'start_time' => '0000-00-00 00:00:00',
			'end_time' => '3000-00-00 00:00:00',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'name' => 'プレミアムガチャ',
			'detail' => '',
			'start_time' => '0000-00-00 00:00:00',
			'end_time' => '3000-00-00 00:00:00',
			'delete_flg' => '0'
		),
	);

}
