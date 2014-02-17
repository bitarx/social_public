<?php
/**
 * StageFixture
 *
 */
class StageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'quest_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'use_act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '消費行動力'),
		'prob_get' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '何かを取得する確率'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'ステージのボス'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'stage_id', 'unique' => 1),
			'FK_mst_stages_mst_enemy' => array('column' => 'enemy_id', 'unique' => 0),
			'FK_stages_quests' => array('column' => 'quest_id', 'unique' => 0)
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
			'stage_id' => '1',
			'quest_id' => '1',
			'title' => '女教師に挨拶！',
			'use_act' => '1',
			'prob_get' => '20',
			'enemy_id' => '1',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '2',
			'quest_id' => '1',
			'title' => '女教師に師事！',
			'use_act' => '1',
			'prob_get' => '20',
			'enemy_id' => '2',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '3',
			'quest_id' => '1',
			'title' => '女教師を鎮激！',
			'use_act' => '1',
			'prob_get' => '20',
			'enemy_id' => '3',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '4',
			'quest_id' => '2',
			'title' => '特警に接触！',
			'use_act' => '2',
			'prob_get' => '20',
			'enemy_id' => '4',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '5',
			'quest_id' => '2',
			'title' => '特警と交渉！',
			'use_act' => '2',
			'prob_get' => '20',
			'enemy_id' => '5',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '6',
			'quest_id' => '2',
			'title' => '特警と対決！',
			'use_act' => '2',
			'prob_get' => '20',
			'enemy_id' => '6',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '7',
			'quest_id' => '3',
			'title' => 'ワガママ娘に注意！',
			'use_act' => '3',
			'prob_get' => '20',
			'enemy_id' => '7',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '8',
			'quest_id' => '3',
			'title' => 'ワガママ娘におしおき！',
			'use_act' => '3',
			'prob_get' => '20',
			'enemy_id' => '8',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '9',
			'quest_id' => '3',
			'title' => 'ワガママ娘をこらしめ！',
			'use_act' => '3',
			'prob_get' => '20',
			'enemy_id' => '9',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '10',
			'quest_id' => '4',
			'title' => 'CAにペッティング！',
			'use_act' => '4',
			'prob_get' => '20',
			'enemy_id' => '10',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '11',
			'quest_id' => '4',
			'title' => 'CAを誘惑！',
			'use_act' => '4',
			'prob_get' => '20',
			'enemy_id' => '11',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '12',
			'quest_id' => '4',
			'title' => 'CAに種付け！',
			'use_act' => '4',
			'prob_get' => '20',
			'enemy_id' => '12',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '13',
			'quest_id' => '5',
			'title' => 'くのいちを撃退！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '13',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '14',
			'quest_id' => '5',
			'title' => 'くのいちを辱め！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '14',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '15',
			'quest_id' => '5',
			'title' => 'くのいちを屈服！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '15',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '16',
			'quest_id' => '6',
			'title' => 'ゴスロリデザイナーに交渉！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '16',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '17',
			'quest_id' => '6',
			'title' => 'ゴスロリデザイナーを説得！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '17',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '18',
			'quest_id' => '6',
			'title' => 'ゴスロリデザイナーを調教！',
			'use_act' => '5',
			'prob_get' => '20',
			'enemy_id' => '18',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '19',
			'quest_id' => '7',
			'title' => '女将にイタズラ！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '19',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '20',
			'quest_id' => '7',
			'title' => '女将を刺激！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '20',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '21',
			'quest_id' => '7',
			'title' => '女将を堕落！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '21',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '22',
			'quest_id' => '8',
			'title' => 'アイドルに教育！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '22',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '23',
			'quest_id' => '8',
			'title' => 'アイドルに実演！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '23',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '24',
			'quest_id' => '8',
			'title' => 'アイドルとレッスン！',
			'use_act' => '6',
			'prob_get' => '20',
			'enemy_id' => '24',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '25',
			'quest_id' => '9',
			'title' => '女学生におさわり！',
			'use_act' => '7',
			'prob_get' => '20',
			'enemy_id' => '25',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '26',
			'quest_id' => '9',
			'title' => '女学生を愛撫！',
			'use_act' => '7',
			'prob_get' => '20',
			'enemy_id' => '26',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '27',
			'quest_id' => '9',
			'title' => '女学生に痴漢！',
			'use_act' => '7',
			'prob_get' => '20',
			'enemy_id' => '27',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '28',
			'quest_id' => '10',
			'title' => '秘書としっぽり！',
			'use_act' => '8',
			'prob_get' => '20',
			'enemy_id' => '28',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '29',
			'quest_id' => '10',
			'title' => '秘書にケツハメ！',
			'use_act' => '8',
			'prob_get' => '20',
			'enemy_id' => '29',
			'delete_flg' => '0'
		),
		array(
			'stage_id' => '30',
			'quest_id' => '10',
			'title' => '秘書と生ハメ！',
			'use_act' => '8',
			'prob_get' => '20',
			'enemy_id' => '30',
			'delete_flg' => '0'
		),
	);

}
