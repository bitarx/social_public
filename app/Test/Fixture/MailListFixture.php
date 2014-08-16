<?php
/**
 * MailListFixture
 *
 */
class MailListFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'mail_list_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pref' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6),
		'mail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'end_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'mail_list_id', 'unique' => 1),
			'mail' => array('column' => 'mail', 'unique' => 1)
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
			'mail_list_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'pref' => 1,
			'mail' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1,
			'end_flg' => 1,
			'created' => 1404285587,
			'updated' => '2014-07-02 16:19:47'
		),
	);

}
