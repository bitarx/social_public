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
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_deck_id', 'user_card_id'), 'unique' => 1),
			'FK_user_deck_cards_cards' => array('column' => 'user_card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
    /*
		array(
			'user_deck_id' => 1,
			'user_card_id' => 1,
			'delete_flg' => 0,
			'created' => '2014-02-17 21:30:44',
			'modified' => '2014-02-17 21:30:44'
		),
        */
	);

}
