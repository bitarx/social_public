<?php
/**
 * EnemyFixture
 *
 */
class EnemyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'enemys';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'HP最大値'),
		'atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '攻撃力'),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '防御力'),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'スキルID'),
		'before_words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'comment' => '戦闘前セリフ', 'charset' => 'utf8'),
		'after_win_words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'comment' => 'プレイヤーが勝ったとき', 'charset' => 'utf8'),
		'after_lose_words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'comment' => 'プレイヤーが負けたとき', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_enemys_mst_skills' => array('column' => 'skill_id', 'unique' => 0)
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
			'hp' => 1,
			'atk' => 1,
			'def' => 1,
			'skill_id' => 1,
			'before_words' => 'Lorem ipsum dolor sit amet',
			'after_win_words' => 'Lorem ipsum dolor sit amet',
			'after_lose_words' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1
		),
	);

}
