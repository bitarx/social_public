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
		'enemy_hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'HP最大値'),
		'enemy_atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '攻撃力'),
		'enemy_def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '防御力'),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'スキルID'),
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
			'enemy_id' => '1',
			'card_name' => '一ヶ谷 かほり',
			'enemy_hp' => '1000',
			'enemy_atk' => '50',
			'enemy_def' => '50',
			'skill_id' => '1',
			'before_words' => 'あなたが期待のルーキー君かしら？ぱっと見はともかく、あっちの方は凄いのかしらね？とりあえず、テストさせてもらうわね！',
			'after_win_words' => '確かになかなかの物だわ…私の体をこんなにも熱くさせるなんて…このままでは…あれ？なんで私、そんな風に考えたのかしら？',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '2',
			'card_name' => '一ヶ谷 かほり',
			'enemy_hp' => '1500',
			'enemy_atk' => '100',
			'enemy_def' => '100',
			'skill_id' => '1',
			'before_words' => '探索と調査にも慣れてきたようね。協力してくれる美女や、エロイーズの因子を持つ美女を発見するには、足で稼ぐのが基本なのよ？',
			'after_win_words' => '仕事でレクチャーしているはずなのに、どうしてこんなに気持ちいいのかしら…まさか、私…いや、そんなことって…けど…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '3',
			'card_name' => '一ヶ谷 かほり',
			'enemy_hp' => '2000',
			'enemy_atk' => '130',
			'enemy_def' => '120',
			'skill_id' => '1',
			'before_words' => 'まさか私が【鎮激】の対象だったなんて、自分では気づかなかったわ…けどこの際だから、経験させてあげる…私をコマせたら、ね！',
			'after_win_words' => 'そう、そのまま、孕ませるイメージを持って激しく動いて…あぁんっ…最高よっ…このオチンポなら、きっと世界を救えるわ…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '4',
			'card_name' => '二科 昭子',
			'enemy_hp' => '2000',
			'enemy_atk' => '150',
			'enemy_def' => '150',
			'skill_id' => '1',
			'before_words' => 'ちょっとそこのあなた、ここは一般人は立ち入り禁止です。速やかに…許可はもらっている？一体、誰がそんな許可を出したのよ？',
			'after_win_words' => 'なっ…私を【鎮激】するですって！？こ、こんな事があってはならないわ！どうしてみんな助けてくれないの！？まさか…そんな…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '5',
			'card_name' => '二科 昭子',
			'enemy_hp' => '2500',
			'enemy_atk' => '200',
			'enemy_def' => '200',
			'skill_id' => '1',
			'before_words' => '理屈としては分かるわ…けど、だからと言ってはいそうですか、って股を開けるわけないじゃないの！私は絶対に嫌なんだからね！',
			'after_win_words' => 'こんな…おちんちんに触れられるだけで、体がひどくしびれて…私、本当にエロイーズの因子に蝕まれているの…？けど…っ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '6',
			'card_name' => '二科 昭子',
			'enemy_hp' => '3000',
			'enemy_atk' => '250',
			'enemy_def' => '250',
			'skill_id' => '1',
			'before_words' => 'くっ…例え私がエロイーズの因子を持っているとしても…そう簡単には負けてやるものですか！特警としてのプライドがあるのよ！',
			'after_win_words' => '…好きにしなさいよ…無理矢理にはしない？今更優しくされたって…あっ…入ってくる…このおちんちん…やだ、凄いっ…ぁあっん！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '7',
			'card_name' => '三峯 ぴゅあら',
			'enemy_hp' => '3000',
			'enemy_atk' => '300',
			'enemy_def' => '300',
			'skill_id' => '1',
			'before_words' => 'ねえ、そこのあなた、そう、あなたよ。ちょっと疲れちゃったから?、そうね、椅子になってくれない？そこに四つん這いになって？',
			'after_win_words' => '座ってイイですって？だっ！誰がブリッジしてチンポ固くしてるところに座るって言うのよ！信じられないっ…一体なんなのよーっ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '8',
			'card_name' => '三峯 ぴゅあら',
			'enemy_hp' => '3500',
			'enemy_atk' => '350',
			'enemy_def' => '350',
			'skill_id' => '1',
			'before_words' => 'やっ、ま、またアンタなの！？本当に言う事を聞くつもりあるの？そうね…じゃあ喉が渇いたから、何か美味しい飲み物持ってきて？',
			'after_win_words' => '最高のジュースを用意した？殊勝な心がけ…むぐっ！？んっ、んーっ！！(や、やだっ…おしっことザーメン、直に飲まされてる！？)',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '9',
			'card_name' => '三峯 ぴゅあら',
			'enemy_hp' => '4000',
			'enemy_atk' => '400',
			'enemy_def' => '400',
			'skill_id' => '1',
			'before_words' => '体がしびれて、熱くて…あなた一体何者？私が何をしたっていうの？私がちやほやされるのは当たり前なのに、どうして邪魔するの？',
			'after_win_words' => 'ぁあーんっ！ごめんなさいっ、わがまま放題でごめんなさい、反省します、だから、だからっ、オマンコでイカせて、イカせてぇ?！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '10',
			'card_name' => '四藤 ハルカ',
			'enemy_hp' => '4000',
			'enemy_atk' => '450',
			'enemy_def' => '450',
			'skill_id' => '1',
			'before_words' => '主催の方ですね？お疲れ様です。こうした貸し切りの機内ですと、職務とはいえどうしても開放的な気持ちになってしまいますね…',
			'after_win_words' => 'い、いけません、お客様、添乗員に対するこのような行為は…美女達がいっぱいいるのに、どうして私などに手を出されるのですか？',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '11',
			'card_name' => '四藤 ハルカ',
			'enemy_hp' => '4500',
			'enemy_atk' => '500',
			'enemy_def' => '500',
			'skill_id' => '1',
			'before_words' => 'お客様、このような事は…ああっ…でも、なぜか目が離せません…まるで離陸する飛行機の機首みたいに…そそり立ったオチンポ…',
			'after_win_words' => 'それでは、その、お口だけでしたら…んっ…むぷ…凄い…固くて熱いオチンポ…雄臭い精液…私の口にいっぱい注ぎ込んで下さいね…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '12',
			'card_name' => '四藤 ハルカ',
			'enemy_hp' => '5000',
			'enemy_atk' => '550',
			'enemy_def' => '550',
			'skill_id' => '1',
			'before_words' => 'やっぱり私、どこかおかしかったんですね…そうでなくちゃ…危険日に知らない男の人のオチンポ欲しいなんて…ありえませんから…',
			'after_win_words' => 'はぁあっん…お客様のオチンポで、私、オマンコイきますっ…危険日膣出しセックス、よすぎて…イくっ…飛ぶっ、飛んじゃうーっ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '13',
			'card_name' => '五島 町',
			'enemy_hp' => '5000',
			'enemy_atk' => '600',
			'enemy_def' => '600',
			'skill_id' => '1',
			'before_words' => '貴様が因子持ちを【鎮激】しているという男か…この件はお前のような奴がチンポを突っ込む問題ではない…早々に手を引け！',
			'after_win_words' => 'なっ…触れられるだけで痺れが走るだと…この男、一体何の忍術を使って…？そうじゃないだと？バカな…貴様一体、何者…！？',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '14',
			'card_name' => '五島 町',
			'enemy_hp' => '5500',
			'enemy_atk' => '650',
			'enemy_def' => '650',
			'skill_id' => '1',
			'before_words' => '体が痺れるのは私が因子持ちだからだと？世迷い言を…仮にそうだとしても、貴様の薄汚いチンポなどに誰が屈してやるものか…！',
			'after_win_words' => 'くぁあっ…こんな…手コキで射精の手伝いをさせられるなど…精液も舐めろ？敗者に権利は無い？くっ…ちゅぱ…煮こごりみたいだ…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '15',
			'card_name' => '五島 町',
			'enemy_hp' => '6000',
			'enemy_atk' => '700',
			'enemy_def' => '700',
			'skill_id' => '1',
			'before_words' => '伝統を受け継ぐくの一として、貴様などに国家の大業を任せるわけにはいかないのだ！貴様のチンポになんか…絶対に…負けないッ！',
			'after_win_words' => 'あぁっ…大切に守ってきた処女マンコが…チンポに負けちゃうっ…やっぱり勝てないっ…チンポの射精のお手伝い、気持ちいいっ…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '16',
			'card_name' => 'ゼクス アリス',
			'enemy_hp' => '6000',
			'enemy_atk' => '750',
			'enemy_def' => '750',
			'skill_id' => '1',
			'before_words' => '無粋な男と女達が一体何の御用かしら？ここは少女達の心の闇と儚い夢に向き合うわたくしのアトリエ…無礼な振る舞いは許さない…',
			'after_win_words' => 'わたくしの気持ちを、一時的とはいえ屈させた…見事ね…ご褒美にこのタイツ越しのつま先で、あなたの事を慰めてあげる…嬉しい？',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '17',
			'card_name' => 'ゼクス アリス',
			'enemy_hp' => '6500',
			'enemy_atk' => '800',
			'enemy_def' => '800',
			'skill_id' => '1',
			'before_words' => '因子の危険性についてはわたくしも理解しているわ…けれども、こうして制御出来てる…【鎮激】の力を持つならわかるでしょう？',
			'after_win_words' => 'この場所のしきたりに沿って、わたくしに罰を与えるのね…あなたを無粋だとののしったのは取り消すわ…ご覧なさい、純潔の証よ…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '18',
			'card_name' => 'ゼクス アリス',
			'enemy_hp' => '7000',
			'enemy_atk' => '850',
			'enemy_def' => '850',
			'skill_id' => '1',
			'before_words' => '杭を打ち込まれ、汚される少女こその美しさがある事は分かってるわ…だけど、怖いの…あなたは、その心の闇を包み込めるかしら？',
			'after_win_words' => 'わたくしはあなたによって、淫らな誘惑に墜ちていく籠の中の鳥にされてしまったのね…この身の全てを…あなたに…捧げますわ…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '19',
			'card_name' => '七星 しおり',
			'enemy_hp' => '7000',
			'enemy_atk' => '900',
			'enemy_def' => '900',
			'skill_id' => '1',
			'before_words' => 'お越し頂きありがとうございます。ええ、この旅館は私が中心となって切り盛りさせて頂いております…お客様？一体何を…！？',
			'after_win_words' => 'こんな、いけません、お客様、私どもはこのようなサービスを致してはおりません…どうかお静まりになって下さいませ…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '20',
			'card_name' => '七星 しおり',
			'enemy_hp' => '7500',
			'enemy_atk' => '950',
			'enemy_def' => '950',
			'skill_id' => '1',
			'before_words' => 'わたしの中に危険な存在が潜んでいる？今度はオカルトですか…わたし達はこの旅館の土地を渡しは致しません！お引き取り下さい！',
			'after_win_words' => 'まさか、本当に私の中に淫らなものが…？だって、こんなにもたくましいオチンポが気になって…ぁっん、この雄臭さ…久しぶり…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '21',
			'card_name' => '七星 しおり',
			'enemy_hp' => '8000',
			'enemy_atk' => '1000',
			'enemy_def' => '1000',
			'skill_id' => '1',
			'before_words' => '地上げ屋ではなかったのですね…ですが、お客様の誘惑に応じたとあれば、女将として示しがつきません…どうかご堪忍下さいませ…',
			'after_win_words' => 'ああっ…この雄チンポで、もう私、ただの女に戻ってしまいました…おまんこ、我慢出来ない…っく、イく、イきます、あぁーんッ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '22',
			'card_name' => '八内 ぱゆゆ',
			'enemy_hp' => '8000',
			'enemy_atk' => '1050',
			'enemy_def' => '1050',
			'skill_id' => '1',
			'before_words' => 'ふーっ、疲れた?。あっ、お疲れ様です！この控え室に入ってこられると言う事は、やっぱりその、偉い方なんですか?？',
			'after_win_words' => 'きゃっ…！やっ、止めて下さい！変な事したら人を呼びますよ！誰も来ない…！？ふふ、残念でした、もう休憩は終わりだし?！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '23',
			'card_name' => '八内 ぱゆゆ',
			'enemy_hp' => '8500',
			'enemy_atk' => '1100',
			'enemy_def' => '1100',
			'skill_id' => '1',
			'before_words' => 'お客さんがノってるのはエロイーズのナントカが原因？そ、そんな事ないもん！私がアイドルとして輝いてるからに決まってるし！',
			'after_win_words' => 'やっ、ダメっ、おちんちん、ぱんつに擦りつけちゃダメなんだからっ、乳首っ、いじらないでっ…どうして、やだ、こんなの変だよ?',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '24',
			'card_name' => '八内 ぱゆゆ',
			'enemy_hp' => '9000',
			'enemy_atk' => '1150',
			'enemy_def' => '1150',
			'skill_id' => '1',
			'before_words' => 'だ、ダメっ…この後はアンコールだから…アイドルはエッチな事しちゃダメだからっ…おちんちん…見せつけてもダメなんだから?！',
			'after_win_words' => 'いやぁんっ…みんな待ってるのに、私、こっそりＨして気持ちよくなってる…マイクじゃなくておちんちんで声出しちゃってるっ?！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '25',
			'card_name' => '九里 琴美',
			'enemy_hp' => '9000',
			'enemy_atk' => '1200',
			'enemy_def' => '1200',
			'skill_id' => '1',
			'before_words' => 'やっ…また、私、男の人に痴漢されるの…？怖いっ…もう嫌ですっ…お願い、触ってこないでくださいっ…！大声、出しますよ…！',
			'after_win_words' => '私の事を助けに来た？話を聞いて欲しい…？そう言いながら、私にいやらしい事をするんじゃ…いつでも、大声出せるんですから…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '26',
			'card_name' => '九里 琴美',
			'enemy_hp' => '9500',
			'enemy_atk' => '1250',
			'enemy_def' => '1250',
			'skill_id' => '1',
			'before_words' => '私の中の因子を【鎮激】しないと、男の人に痴漢され続ける、ですか…そんな事言って、あなたも私に痴漢したいだけなんじゃ…？',
			'after_win_words' => 'なんだろう…触られると心地よい痺れがあって…この痴漢さんは、これまでとはなんか違う…どうしてこんなにも安心するのかな…？',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '27',
			'card_name' => '九里 琴美',
			'enemy_hp' => '10000',
			'enemy_atk' => '1300',
			'enemy_def' => '1300',
			'skill_id' => '1',
			'before_words' => 'そ、その、痴漢さんとエッチな事をすれば、もう知らない人に触られる事も無くなるんですよね？信じても、いいんですよね…？',
			'after_win_words' => 'ああっ…私、電車の中で自分からエッチな事しちゃってるっ…痴漢さんとのセックスで感じて…イっちゃうっ、イっちゃうぅぅーっ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '28',
			'card_name' => '神無月 ナナイ ',
			'enemy_hp' => '10000',
			'enemy_atk' => '1350',
			'enemy_def' => '1350',
			'skill_id' => '1',
			'before_words' => 'それでは、その、お手合わせよろしくお願いしますね。こういう経験は実は初めてなもので、色々手こずらせてしまうと思いますが…',
			'after_win_words' => 'んっ…上手にフェラ出来ていますか？ありがとうございます…このままおっぱいでも挟みますから…いつでも好きに顔射して下さい…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '29',
			'card_name' => '神無月 ナナイ ',
			'enemy_hp' => '11000',
			'enemy_atk' => '1400',
			'enemy_def' => '1400',
			'skill_id' => '1',
			'before_words' => '私、自分ではかなりの堅物だと思うんですけど、すっかりあなたに夢中にさせられて…なんだか不思議で、すごくいやらしい感じ…',
			'after_win_words' => 'バージンよりも先に、アナル処女を捧げるなんて…けど…気持ちよすぎて…ケツマンコにアナルアクメ…覚えさせられちゃいますっ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '30',
			'card_name' => '神無月 ナナイ ',
			'enemy_hp' => '12000',
			'enemy_atk' => '1450',
			'enemy_def' => '1450',
			'skill_id' => '1',
			'before_words' => 'ふふっ…私、オチンポの入る穴の初めてを、全部あなたに捧げてしまうんですね…でも、ちゃんと私の事をコマしてから、ですよ？',
			'after_win_words' => 'ああっ…これがあなたのオチンポ…！私の処女マンコ、いかがですか？このまま膣出し孕ませ射精で、私の子宮を躾けて下さいっ…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '31',
			'card_name' => 'セレン',
			'enemy_hp' => '6000',
			'enemy_atk' => '750',
			'enemy_def' => '750',
			'skill_id' => '1',
			'before_words' => 'フフ…初めまして。お初にお目にかかるわね…わたしの名前はセレン。わたしが何者なのか気になっているようだけど、そんな事より、この空間をある程度思い通りに歩けると言う事は、あなたは【鎮激】の力を持っている…フフ…変わり者同士、仲良くしてみない？あなたのお仲間の美女たちと一緒に、わたしのことを捕まえてごらんなさいな！',
			'after_win_words' => 'さすが、そう簡単にはなびかない強さはちゃんとあるみたいね！それじゃあ早速味見させてもらおうかしら…何をって？もちろんPenisに決まっているじゃない。あっ、こっちでは"オチンチン"って言うのよね。なんだかいやらしい響き…フフ…やっぱりガチガチにたくましくなってる。私の中に入りたくて仕方ないんでしょう？ノンノン、まずは味見って言ったでしょう？最初はお口でしてあげる…んっ…んふ…くぷっ…ふふ、すぐイキそうになってびっくりしてるのね？もうちょっと頑張ってね、オチンチンさん…んっ…じゅぷっ…ぁむ…いいわよ…お口にも顔にもおっぱいにも、いっぱいかけて…ぁあっ！熱いのきたぁっ…凄いっ…濃くて…いやらしい匂い…これだけで、イっちゃうっ…',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '32',
			'card_name' => 'セレン',
			'enemy_hp' => '6500',
			'enemy_atk' => '800',
			'enemy_def' => '800',
			'skill_id' => '1',
			'before_words' => '長さ、太さ、濃さに持続力、テクニックも申し分無し…生まれつきじゃなくて、ある程度の修羅場を踏んでたくましくなったあなたのオチンチン、わたし、とっても興味が出て来たわ！出来ればあなたごと、国に持って帰りたいくらい。わたしが何者か知りたい？そうね…もう少しテストさせてくれないかしら？もっとイイ事、してあげるわよ？',
			'after_win_words' => 'フフ…よくできましたっ。わたしのここも、すっかり準備出来てるわよ？ほら、こうして指で広げるとよく見えるでしょ？由緒正しい魔女としてずっと守ってきた、ええと…日本語でオマンコ、で合ってるかしら？オチンチンの味を知らないのに、こんなにもヒクヒクして、あなたが入ってくるのを待っているの…ね、早く、わたしの初オマンコ、あなたのオチンチンで獣みたいに思いっきり、いっぱい犯して…！こ、これっ…！これ凄いっ…これが本当のセックスっ…オマンコの中、オチンチンでいっぱいっ…ぁんっ、やぁっ、これ、いた、ううんっ、いいっ、凄く、気持ちいいっ、初セックスでっ、初イキ、できちゃうっ、いく、イくからっ、もっと、オチンチン、ズポズポしてぇっ…！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
		array(
			'enemy_id' => '33',
			'card_name' => 'セレン',
			'enemy_hp' => '7000',
			'enemy_atk' => '850',
			'enemy_def' => '850',
			'skill_id' => '1',
			'before_words' => 'フフ…あなたを見るだけで、魔女の血がうずくわ…そう、わたしは魔女。でも、エロイーズじゃなくて、イギリスの古きから伝わる本物の魔女よ。この国でもエロイーズに対抗している人々がいると聞いて、ちょっと試しに来たってわけ。…少々やりすぎた？おしおきが必要？フフ…また…あなたのオチンチンにおしおきされちゃうのかしら？',
			'after_win_words' => 'ぁあんっ…またオチンチン入って来たぁっ…！わたしのオマンコ、このオチンチンを気持ちよくさせるためだけの穴にされちゃったぁっ…凄いのっ…気持ちよすぎてっ…きっとこのまま精液出されちゃったらっ…子宮に注がれたらっ…絶対に孕んじゃうっ！赤ちゃん出来ちゃうっ！けどっ…もうっ…拒めないっ…妊娠種付けセックス、止まらないよぉっ…！来たぁっ、出てる、出されてるっ、赤ちゃんのお部屋に精液いっぱい来てるっ…！子宮イキさせられてこんなに出されたら、絶対に妊娠しちゃうのにっ…けどっ…もっとしてっ…膣出ししてっ…きっとわたし、あなたに孕まされるためにここに来たのっ！お口もっ、お尻の穴もっ、オチンチンのための穴にしていいからっ…あぁんっ！',
			'after_lose_words' => '',
			'delete_flg' => '0'
		),
	);

}
