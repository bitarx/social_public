<?php
/**
 * UserEvStageFixture
 *
 */
class UserEvStageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'progress' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '最大100'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:進行中 2:達成 3:ボス勝利'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK_user_ev_stages_mst_ev_stages' => array('column' => 'ev_stage_id', 'unique' => 0),
			'user_ev_stage_id' => array('column' => array('user_id', 'ev_stage_id'), 'unique' => 0)
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
			'ev_stage_id' => 1,
			'progress' => 1,
			'state' => 1,
			'delete_flg' => 1,
			'created' => '2014-02-10 09:47:42',
			'modified' => '2014-02-10 09:47:42'
		),
	);

}
