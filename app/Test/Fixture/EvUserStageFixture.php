<?php
/**
 * EvUserStageFixture
 *
 */
class EvUserStageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'progress' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '最大100'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:進行中 2:達成 3:ボス勝利'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			
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
			'created' => '2014-12-22 17:56:39',
			'modified' => '2014-12-22 17:56:39'
		),
	);

}
