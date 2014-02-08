<?php
/**
 * ItemProbFixture
 *
 */
class ItemProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '同一item_idの合算が分母'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '1:card 2:item 3:money'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_item_probs_mst_items' => array('column' => 'item_id', 'unique' => 0)
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
			'item_id' => 1,
			'prob' => 1,
			'kind' => 1,
			'target' => 1,
			'num' => 1,
			'delete_flg' => 1
		),
	);

}
