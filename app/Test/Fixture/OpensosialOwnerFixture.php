<?php
/**
 * OpensosialOwnerFixture
 *
 */
class OpensosialOwnerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'opensosial_owner_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'comment' => 'SNS側のID', 'charset' => 'utf8'),
		'viewer_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'SNS側のID', 'charset' => 'utf8'),
		'sne_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'SNS側の名前', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'opensosial_owner_id', 'unique' => 1)
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
			'opensosial_owner_id' => 'Lorem ipsum dolor sit amet',
			'viewer_id' => 'Lorem ipsum dolor sit amet',
			'sne_name' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1,
			'created' => '2014-01-26 19:11:41',
			'modified' => '2014-01-26 19:11:41'
		),
	);

}
