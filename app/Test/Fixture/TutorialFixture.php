<?php
/**
 * TutorialFixture
 *
 */
class TutorialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'comment' => '案内キャラのセリフ', 'charset' => 'utf8'),
		'words2' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'words3' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '次のID'),
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
			'title' => 'オープニング',
			'words' => '',
			'words2' => '',
			'words3' => '',
			'next' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'title' => 'ようこそ！エロイーズの世界へ',
			'words' => 'はじめまして。私があなたの【鎮激】をサポートいたします秘書の【ナナイ】と申します。あっ、早くも協力してくれる美女の存在が確認されたようですね。早速、迎えに行きましょう！',
			'words2' => '',
			'words3' => '',
			'next' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'title' => '【鎮激】演習ミッション開始！',
			'words' => 'あなたがどのようにエロイーズの女達を【鎮激】するのか学ぶべく、演習のため街へ出ましょう！美女の力は、あなたがエロイーズの誘惑に屈しないために必要です。彼女達と協力していきましょう！',
			'words2' => '',
			'words3' => '',
			'next' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'title' => '鎮激実行',
			'words' => '',
			'words2' => '',
			'words3' => '',
			'next' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'title' => '美女との出会い',
			'words' => 'あなたに協力してくれる美女との新しい出会いがあったようです。どうやら仲間に加わってくれるようですね！',
			'words2' => '',
			'words3' => '',
			'next' => '6',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'title' => '美女を進化させる！',
			'words' => '出会いを重ねて、同じ美女が揃うと、美女を【進化】させる事ができます。それではこの後の演習に向けて、【進化】させてみましょう！',
			'words2' => '',
			'words3' => '',
			'next' => '7',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'title' => '進化合成',
			'words' => '',
			'words2' => '',
			'words3' => '',
			'next' => '8',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'title' => '美女が進化した！',
			'words' => '【進化】させた美女は強くなり、エロイーズの力に対抗するため、こうして一肌脱いでくれます！',
			'words2' => 'さらに同じ美女と出会っていれば、【進化】は3段階目まで可能です。3段階目まで進化させてみると…',
			'words3' => 'う?ん、とってもＨですね！これならあなたがエロイーズの力に鼻の下を伸ばす事もなさそうです！',
			'next' => '9',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'title' => '美女を強化させる！',
			'words' => '美女をレベルアップさせるには、別の美女の力が必要となります。そろそろ目的地に着きますので、【強化】をして演習の準備をしましょう！',
			'words2' => '',
			'words3' => '',
			'next' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '10',
			'title' => '強化合成',
			'words' => '',
			'words2' => '',
			'words3' => '',
			'next' => '11',
			'delete_flg' => '0'
		),
		array(
			'id' => '11',
			'title' => '美女を強化した！',
			'words' => '美女の力を借りて、元の美女がレベルアップ！【攻撃力】や【防御力】が上がるので、どんどん強化していきましょう！',
			'words2' => 'それでは、【鎮激】の演習相手の方とお話をしましょう…んん？どうやら、何か様子がおかしいようですが…！？',
			'words3' => '',
			'next' => '12',
			'delete_flg' => '0'
		),
		array(
			'id' => '12',
			'title' => 'ボス戦！',
			'words' => 'フフッ…【鎮激】の演習なんて適当にして、私と好きなだけ、気持ちいい事しましょ…？',
			'words2' => 'これは緊急事態ですね…どうやらエロイーズの因子によって、演習相手のはずの美女がエロイーズ化しつつあるようです。いきなり実戦ですが、美女の力を借りて彼女を【鎮激】しましょう！',
			'words3' => '',
			'next' => '13',
			'delete_flg' => '0'
		),
		array(
			'id' => '13',
			'title' => 'ボスバトル',
			'words' => '',
			'words2' => '',
			'words3' => '',
			'next' => '14',
			'delete_flg' => '0'
		),
		array(
			'id' => '14',
			'title' => 'バトルに勝利！',
			'words' => 'あぁんっ…私、どうして、オチンポ入れられて…！？んっ…あなたが【鎮激】してくれたのね…嬉しいっ…いいよっ…このままオマンコ精子で溺れるくらい出してっ…赤ちゃん出来てもいいからっ…！中出しセックスで、イくぅーっ！',
			'words2' => '',
			'words3' => '',
			'next' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '15',
			'title' => 'チュートリアル完了！',
			'words' => 'トラブルもありましたが、素晴らしい【鎮激】ぶりでした！この調子で他のエロイーズの女達もどんどん【鎮激】していきましょう！',
			'words2' => '',
			'words3' => '',
			'next' => '16',
			'delete_flg' => '0'
		),
		array(
			'id' => '16',
			'title' => 'チュートリアル完了報酬！',
			'words' => 'それでは早速、世界を救いに出かけま…と、これからの【鎮激】にきっと役立つアイテムについて、いくつかご紹介いたしましょう。',
			'words2' => '初回の1回だけは特別セールとなっておりますので、上手に使って頂ければと思います。それから、私からも、心ばかりですがあなたにプレゼントを…',
			'words3' => '',
			'next' => '99',
			'delete_flg' => '0'
		),
	);

}
