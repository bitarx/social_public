<?php
/**
 * SnsUserFixture
 *
 */
class SnsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'comment' => 'opensocial_owner_id', 'charset' => 'utf8'),
		'viewer' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'opensocial_viewer_id', 'charset' => 'utf8'),
		'sns_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'SNS側の名前', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'id' => 'Lorem ipsum dolor sit amet',
			'viewer' => 'Lorem ipsum dolor sit amet',
			'sns_name' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1,
			'created' => '2014-02-06 09:56:56',
			'modified' => '2014-02-06 09:56:56'
		),
	);

}
