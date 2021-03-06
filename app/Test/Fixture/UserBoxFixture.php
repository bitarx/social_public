<?php
/**
 * UserBoxFixture
 *
 */
class UserBoxFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_boxs';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'user_item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary', 'comment' => 'ユーザーのどの金庫か'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'key' => 'primary'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'primary'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'user_item_id', 'kind', 'target'), 'unique' => 1),
			'FK_user_boxs_user_items' => array('column' => 'user_item_id', 'unique' => 0)
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
			'user_id' => 1,
			'user_item_id' => 1,
			'kind' => 1,
			'target' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-17 21:30:43',
			'modified' => '2014-02-17 21:30:43'
		),
	);

}
