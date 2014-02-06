<?php
/**
 * SkillFixture
 *
 */
class SkillFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:hp 2:atk 3:def'),
		'updown' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:up 2:down'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:自分 2:相手'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '相手のatkを何％下げるなど'),
		'words' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'effect' => 1,
			'updown' => 1,
			'target' => 1,
			'percent' => 1,
			'words' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1
		),
	);

}
