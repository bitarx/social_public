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
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'gacha_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'gacha_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => '3000-01-01 00:00:00'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'gacha_id', 'unique' => 1)
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
			'gacha_id' => '1',
			'gacha_name' => 'ノーマルガチャ',
			'gacha_detail' => '',
			'start_time' => '0000-00-00 00:00:00',
			'end_time' => '3000-00-00 00:00:00',
			'delete_flg' => '0'
		),
		array(
			'gacha_id' => '2',
			'gacha_name' => 'プレミアムガチャ',
			'gacha_detail' => '',
			'start_time' => '2018-01-01 00:00:00',
			'end_time' => '3000-00-00 00:00:00',
			'delete_flg' => '0'
		),
	);

}
