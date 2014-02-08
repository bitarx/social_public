<?php
/**
 * CardGroupFixture
 *
 */
class CardGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'evol_group' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '次の進化のcard_group_id'),
		'prev' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '前の進化のcard_group_id'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'group_id' => array('column' => 'evol_group', 'unique' => 0),
			'FK_mst_card_groups_mst_cards' => array('column' => 'card_id', 'unique' => 0)
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
			'evol_group' => 1,
			'card_id' => 1,
			'next' => 1,
			'prev' => 1,
			'delete_flg' => 1
		),
	);

}
