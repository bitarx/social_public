<?php
/**
 * GachaProbFixture
 *
 */
class GachaProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '合算した値が分母になる'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_gacha_probs_mst_gachas' => array('column' => 'gacha_id', 'unique' => 0),
			'FK_mst_gacha_probs_mst_cards' => array('column' => 'card_id', 'unique' => 0)
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
			'gacha_id' => 1,
			'card_id' => 1,
			'prob' => 1,
			'delete_flg' => 1
		),
	);

}
