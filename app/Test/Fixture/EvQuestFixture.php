<?php
/**
 * EvQuestFixture
 *
 */
class EvQuestFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ev_quest_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before1' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before2' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_quest_id', 'unique' => 1)
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
			'ev_quest_id' => '1',
			'title' => '蒼い瞳の誘惑',
			'detail' => 'とある学園の周辺地域の空間に、見て分かる程の異常が発生しています！それと前後して、現場では留学生らしき美女の姿が頻繁に目撃されています…彼女が何者なのかは現在調査中ですが、エロイーズの因子らしい気配があるとの事です。調査へと向かいましょう！',
			'detail_before1' => '',
			'detail_before2' => '',
			'detail_after' => '彼女がいわゆる、伝統的な意味での本物の魔女というのにはビックリしました！どちらも古くから存在している魔女だから、エロイーズと区別が難しかったんですね。今回はちょっとやりすぎと言う事で、キツくおしおきをさせて頂いたとは言え、海の向こうでもエロイーズと戦っている人々がいて、この世界を人知れず守ろうとしている…この事はとても心強く感じられます。これからも頑張りましょう！',
			'delete_flg' => '0',
			'start_time' => '0000-00-00 00:00:00',
			'end_time' => '0000-00-00 00:00:00'
		),
	);

}
