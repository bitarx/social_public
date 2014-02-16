<?php
/**
 * EvStageFixture
 *
 */
class EvStageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'ev_quest_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'use_act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '消費行動力'),
		'prob_get' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '何かを取得する確率'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'ステージのボス'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_ev_stages_mst_ev_quests' => array('column' => 'ev_quest_id', 'unique' => 0),
			'FK_ev_stages_enemys' => array('column' => 'enemy_id', 'unique' => 0)
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
			'ev_quest_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'use_act' => 1,
			'prob_get' => 1,
			'enemy_id' => 1,
			'delete_flg' => 1
		),
	);

}
