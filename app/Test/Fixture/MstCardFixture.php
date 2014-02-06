<?php
/**
 * MstCardFixture
 *
 */
class MstCardFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '肩書き', 'charset' => 'utf8'),
		'height' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '身長'),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '体重'),
		'size' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '3サイズ', 'charset' => 'utf8'),
		'blood' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '血液型', 'charset' => 'utf8'),
		'rare_level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 3, 'comment' => 'レアリティ 1:N 2:HN 3:R 4:HR 5:SR'),
		'attr' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:愛 2:舞 3:魅'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => 'セリフ', 'charset' => 'utf8'),
		'detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => '解説', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_cards_mst_skill' => array('column' => 'skill_id', 'unique' => 0)
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
			'title' => 'Lorem ipsum dolor sit amet',
			'height' => 1,
			'weight' => 1,
			'size' => 'Lorem ipsum dolor sit amet',
			'blood' => 'Lorem ipsum dolor sit amet',
			'rare_level' => 1,
			'attr' => 1,
			'hp' => 1,
			'act' => 1,
			'def' => 1,
			'skill_id' => 1,
			'words' => 'Lorem ipsum dolor sit amet',
			'detail' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1
		),
	);

}
