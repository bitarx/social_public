<?php
/**
 * UserParamFixture
 *
 */
class UserParamFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'usersのid'),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ゲーム内通貨'),
		'act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '行動力'),
		'act_max' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '攻撃力最大値'),
		'cost_atc' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '攻撃デッキコスト'),
		'cost_def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '防御デッキコスト'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'レベル'),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '経験値'),
		'win' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'バトル勝利数'),
		'lose' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'バトル敗北数'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => 1,
			'money' => 1,
			'act' => 1,
			'act_max' => 1,
			'cost_atc' => 1,
			'cost_def' => 1,
			'level' => 1,
			'exp' => 1,
			'win' => 1,
			'lose' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-08 09:55:33',
			'modified' => '2014-02-08 09:55:33'
		),
	);

}
