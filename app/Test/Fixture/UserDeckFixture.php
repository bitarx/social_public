<?php
/**
 * UserDeckFixture
 *
 */
class UserDeckFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_deck_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:攻撃デッキ 2:防御デッキ'),
		'user_deck_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_deck_id', 'unique' => 1),
			'FK_user_decks_users' => array('column' => 'user_id', 'unique' => 0)
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
			'user_deck_id' => 1,
			'user_id' => 1,
			'kind' => 1,
			'user_deck_name' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 0,
			'created' => '2014-02-23 07:24:27',
			'modified' => '2014-02-23 07:24:27'
		),
	);

}
