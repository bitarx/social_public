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
		'user_deck_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'deck_number' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_deck_id', 'user_card_id'), 'unique' => 1),
			'FK_user_deck_cards_user_cards' => array('column' => 'user_card_id', 'unique' => 0)
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
			'user_card_id' => 1,
			'delete_flg' => 0,
			'created' => '2014-02-23 07:26:24',
			'modified' => '2014-02-23 07:26:24'
		),
	);

}
