<?php
/**
 * TutorialFixture
 *
 */
class TutorialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'comment' => '案内キャラのセリフ', 'charset' => 'utf8'),
		'words2' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'words3' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '次のID'),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 2,
			'delete_flg' => 0
		),
		array(
			'id' => 2,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 3,
			'delete_flg' => 0
		),
		array(
			'id' => 3,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 4,
			'delete_flg' => 0
		),
		array(
			'id' => 4,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 5,
			'delete_flg' => 0
		),
		array(
			'id' => 5,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 6,
			'delete_flg' => 0
		),
		array(
			'id' => 6,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 7,
			'delete_flg' => 0
		),
		array(
			'id' => 7,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 8,
			'delete_flg' => 0
		),
		array(
			'id' => 8,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 9,
			'delete_flg' => 0
		),
		array(
			'id' => 9,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 10,
			'delete_flg' => 0
		),
		array(
			'id' => 10,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 11,
			'delete_flg' => 0
		),
		array(
			'id' => 11,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 11,
			'delete_flg' => 0
		),
		array(
			'id' => 12,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 13,
			'delete_flg' => 0
		),
		array(
			'id' => 13,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 14,
			'delete_flg' => 0
		),
		array(
			'id' => 14,
			'title' => 'Lorem ipsum dolor sit amet',
			'words' => 'Lorem ipsum dolor sit amet',
			'words2' => 'Lorem ipsum dolor sit amet',
			'words3' => 'Lorem ipsum dolor sit amet',
			'next' => 99,
			'delete_flg' => 0
		),
	);

}
