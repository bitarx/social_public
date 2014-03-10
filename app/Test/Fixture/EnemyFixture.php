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
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'card_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'スキルID'),
		'skill_level' => array('type' => 'integer', 'null' => false, 'default' => '20', 'length' => 10),
		'before_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '戦闘前セリフ', 'charset' => 'utf8'),
		'after_win_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'プレイヤーが勝ったとき', 'charset' => 'utf8'),
		'after_lose_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'プレイヤーが負けたとき', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'enemy_id', 'unique' => 1),
			'FK_enemys_skills' => array('column' => 'skill_id', 'unique' => 0)
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
			'enemy_id' => 1,
			'card_name' => 'Lorem ipsum dolor sit amet',
			'hp' => 1,
			'atk' => 1,
			'def' => 1,
			'skill_id' => 1,
			'skill_level' => 1,
			'before_words' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'after_win_words' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'after_lose_words' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'delete_flg' => 0
		),
	);

}
