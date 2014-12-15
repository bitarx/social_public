<?php
/**
 * UserEvolLogFixture
 *
 */
class UserEvolLogFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_evol_log';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'base_card_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'target_card_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'after_card_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'user_id' => 1,
			'base_card_id' => 1,
			'target_card_id' => 1,
			'after_card_id' => 1,
			'delete_flg' => 1,
			'created' => '2014-12-11 14:24:36'
		),
	);

}
