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
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:def 2:atk'),
		'updown' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:up 2:down'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:自分 2:相手　3.味方 4.相手全体'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '相手のatkを何％下げるなど'),
		'words' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'id' => '1',
			'name' => 'アフタースクール',
			'effect' => '1',
			'updown' => '1',
			'target' => '3',
			'percent' => '35',
			'words' => '味方の防御力を大アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'name' => 'アデージョの真髄',
			'effect' => '2',
			'updown' => '1',
			'target' => '3',
			'percent' => '35',
			'words' => '味方の攻撃力を大アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'name' => '危険な昼下がり',
			'effect' => '1',
			'updown' => '2',
			'target' => '4',
			'percent' => '35',
			'words' => '相手全体の防御力を大ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'name' => '母は強し',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'words' => '自分の防御力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'name' => 'アイドルマスタリー',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'words' => '自分の攻撃力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'name' => 'ボトル入りまーす！',
			'effect' => '2',
			'updown' => '1',
			'target' => '3',
			'percent' => '6',
			'words' => '味方の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'name' => '渋谷で17時',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '30',
			'words' => '相手の攻撃力を中ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'name' => '人間狩り',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '30',
			'words' => '自分の攻撃力を中アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'name' => 'お姉ちゃんにおまかせ',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '6',
			'words' => '相手全体の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '10',
			'name' => 'お帰りなさいませ',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '11',
			'name' => 'サークルクラッシュ',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'words' => '相手の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '12',
			'name' => 'おとなだもん！',
			'effect' => '1',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'words' => '相手の防御力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '13',
			'name' => 'ジューンブライド',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '14',
			'name' => 'ムカ着火ファイヤー',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '15',
			'name' => '強制尿検査',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'words' => '相手の攻撃力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '16',
			'name' => 'テストのご褒美',
			'effect' => '2',
			'updown' => '2',
			'target' => '2',
			'percent' => '10',
			'words' => '相手の攻撃力を小ダウン',
			'delete_flg' => '0'
		),
		array(
			'id' => '17',
			'name' => '射精管理',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '18',
			'name' => '箱入り娘',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '19',
			'name' => '四十九日の誓い',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '15',
			'words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '20',
			'name' => '積み木くずし',
			'effect' => '2',
			'updown' => '1',
			'target' => '1',
			'percent' => '15',
			'words' => '自分の攻撃力を小アップ',
			'delete_flg' => '0'
		),
		array(
			'id' => '21',
			'name' => '放課後マニアック',
			'effect' => '1',
			'updown' => '1',
			'target' => '1',
			'percent' => '10',
			'words' => '自分の防御力を小アップ',
			'delete_flg' => '0'
		),
	);

}
