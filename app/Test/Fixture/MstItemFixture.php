<?php
/**
 * MstItemFixture
 *
 */
class MstItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'effect_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'box_num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '0以上でボックスアイテムの当選個数'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index', 'comment' => 'ボックスアイテムの場合開ける為に必要なアイテム'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_items_mst_item_effects' => array('column' => 'effect_id', 'unique' => 0),
			'FK_mst_items_mst_items' => array('column' => 'item_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'detail' => 'Lorem ipsum dolor sit amet',
			'point' => 1,
			'money' => 1,
			'effect_id' => 1,
			'box_num' => 1,
			'item_id' => 1,
			'delete_flg' => 1
		),
	);

}
