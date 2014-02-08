<?php
/**
 * UserDeckCardFixture
 *
 */
class UserDeckCardFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'user_deck_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_deck_cards_users' => array('column' => 'user_id', 'unique' => 0),
			'FK_user_deck_cards_mst_cards' => array('column' => 'card_id', 'unique' => 0),
			'FK_user_deck_cards_user_decks' => array('column' => 'user_deck_id', 'unique' => 0)
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
			'user_deck_id' => 1,
			'card_id' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-08 09:55:30',
			'modified' => '2014-02-08 09:55:30'
		),
	);

}
