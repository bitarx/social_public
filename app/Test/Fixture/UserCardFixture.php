<?php
/**
 * UserCardFixture
 *
 */
class UserCardFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'skill_level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5),
		'skill_exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_card_id', 'unique' => 1),
			'card_id' => array('column' => 'card_id', 'unique' => 0),
			'user_card_id' => array('column' => array('user_id', 'card_id'), 'unique' => 0)
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
			'user_card_id' => 1,
			'user_id' => 1,
			'card_id' => 1,
			'atk' => 1,
			'def' => 1,
			'level' => 1,
			'exp' => 1,
			'skill_level' => 1,
			'skill_exp' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-17 21:30:43',
			'modified' => '2014-02-17 21:30:43'
		),
	);

}
