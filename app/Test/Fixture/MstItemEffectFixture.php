<?php
/**
 * MstItemEffectFixture
 *
 */
class MstItemEffectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => '使用前の説明', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => '使用後の説明', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:act 2:bp'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '回復の割合'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'detail' => 'Lorem ipsum dolor sit amet',
			'detail_after' => 'Lorem ipsum dolor sit amet',
			'effect' => 1,
			'percent' => 1,
			'delete_flg' => 1
		),
	);

}
