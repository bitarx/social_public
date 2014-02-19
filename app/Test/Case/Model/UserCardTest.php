<?php
App::uses('UserCard', 'Model');

/**
 * UserCard Test Case
 *
 */
class UserCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_card',
		'app.user',
		'app.sns_user',
		'app.card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserCard = ClassRegistry::init('UserCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserCard);

		parent::tearDown();
	}


    /**
     * 初回カード登録
     *
     * @author imanishi
     * @return void
     */
     public function testRegistStartCard() {
         $userId = 1;

         $list = array(
            array(
                'card_id' => '1',
                'card_name' => 'あいり',
                'card_title' => '[国民的JK]',
                'height' => '154',
                'weight' => '46',
                'size' => 'B84 W56 H83 Cカップ',
                'blood' => 'O型',
                'rare_level' => '3',
                'attr' => '1',
                'card_hp' => '2000',
                'card_atk' => '200',
                'card_def' => '250',
                'skill_id' => '1',
                'card_words' => 'test',
                'card_detail' => '名門学園に通う清楚で真面目な学生。とはいっても人並みにそ
っち
    方面への興味もしっかり持っている。',
                'delete_flg' => '0'
            ),
            array(
                'card_id' => '2',
                'card_name' => 'あいり',
                'card_title' => '[国民的JK]',
                'height' => '154',
                'weight' => '46',
                'size' => 'B84 W56 H83 Cカップ',
                'blood' => 'O型',
                'rare_level' => '4',
                'attr' => '1',
                'card_hp' => '3000',
                'card_atk' => '250',
                'card_def' => '350',
                'skill_id' => '1',
                'card_words' => '私がHな気持ちになればなるほど、強くなるのはわかったけど…私、いやらしい子になっちゃうの…？',
                'card_detail' => '名門学園に通う清楚で真面目な学生。人好きのするルックスと
体つ
    きに誰もが目を見張ってしまう所も。',
                'delete_flg' => '0'
            ),
         );
         $ret = $this->UserCard->registStartCard ($userId, $list);
         $this->assertTrue($ret);
     }

    /**
     * ユーザの保有カード情報を取得
     *
     * @author imanishi
     */
    public function testGetUserCard() {

         $userId = 1;
         $data = $this->UserCard->getUserCard($userId);
         $expected[] = array(
            'user_card_id' => 1,
         );
         $this->assertEquals($data[0]['user_card_id'], $expected[0]['user_card_id']);
    }

    /**
     * 取得したアイテム等を登録するメソッド確認
     *
     * @author imanishi 
     */
    public function testRegistCard() {

        $targetId = 1;
        $userId = 1;

        // カード
        $num = 2;
        $ret = $this->UserCard->registCard($userId, $targetId, $num);
        $this->assertTrue($ret);
    }

}
