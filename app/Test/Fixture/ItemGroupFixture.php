<?php
/**
 * ItemGroupFixture
 *
 */
class ItemGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'item_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'item_base_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'comment' => 'このアイテムになるitem_id'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'comment' => '対象のアイテム'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_group_id', 'unique' => 1)
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
			'item_group_id' => 1,
			'item_base_id' => 1,
			'item_id' => 1,
			'delete_flg' => 1
		),
	);

}
