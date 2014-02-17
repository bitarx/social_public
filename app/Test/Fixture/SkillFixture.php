<?php
/**
 * SkillFixture
 *
 */
class SkillFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'skill_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:def 2:atk'),
		'updown' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:up 2:down'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:自分 2:相手　3.味方 4.相手全体'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '相手のatkを何％下げるなど'),
		'skill_words' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'skill_id', 'unique' => 1)
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
			'skill_id' => '1',
			'skill_name' => 'アフタースクール',
			'effect' => '1',
			'updown' => '1',
			'target' => '3',
			'percent' => '35',
			'skill_words' => '味方の防御力を大アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '2',
			'skill_name' => 'アデージョの真髄',
			'effect' => '2',
			'updown' => '1',
			'target' => '3',
			'percent' => '35',
			'skill_words' => '味方の攻撃力を大アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '3',
			'skill_name' => '危険な昼下がり',
			'effect' => '1',
			'updown' => '2',
			'target' => '4',
			'percent' => '35',
			'skill_words' => '相手全体の防御力を大ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '4',
			'skill_name' => '母は強し',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'skill_words' => '自分の防御力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '5',
			'skill_name' => 'アイドルマスタリー',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'skill_words' => '自分の攻撃力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '6',
			'skill_name' => 'ボトル入りまーす！',
			'effect' => '2',
			'updown' => '1',
			'target' => '3',
			'percent' => '6',
			'skill_words' => '味方の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '7',
			'skill_name' => '渋谷で17時',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '30',
			'skill_words' => '相手の攻撃力を中ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '8',
			'skill_name' => '人間狩り',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'skill_words' => '自分の攻撃力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '9',
			'skill_name' => 'お姉ちゃんにおまかせ',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '6',
			'skill_words' => '相手全体の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '10',
			'skill_name' => 'お帰りなさいませ',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '11',
			'skill_name' => 'サークルクラッシュ',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'skill_words' => '相手の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '12',
			'skill_name' => 'おとなだもん！',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'skill_words' => '相手の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '13',
			'skill_name' => 'ジューンブライド',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '14',
			'skill_name' => 'ムカ着火ファイヤー',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '15',
			'skill_name' => '強制尿検査',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'skill_words' => '相手の攻撃力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '16',
			'skill_name' => 'テストのご褒美',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'skill_words' => '相手の攻撃力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '17',
			'skill_name' => '射精管理',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '18',
			'skill_name' => '箱入り娘',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '19',
			'skill_name' => '四十九日の誓い',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '15',
			'skill_words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '20',
			'skill_name' => '積み木くずし',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '15',
			'skill_words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'skill_id' => '21',
			'skill_name' => '放課後マニアック',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'skill_words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
	);

}
