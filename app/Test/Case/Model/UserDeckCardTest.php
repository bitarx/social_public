<?php
App::uses('UserDeckCard', 'Model');

/**
 * UserDeckCard Test Case
 *
 */
class UserDeckCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_deck_card',
		'app.user',
		'app.sns_user',
		'app.battle_log',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
		'app.user_card',
		'app.card',
		'app.skill',
		'app.enemy',
		'app.ev_stage',
		'app.ev_quest',
		'app.ev_stage_prob',
		'app.stage',
		'app.quest',
		'app.stage_prob',
		'app.raid',
		'app.user_raid',
		'app.user_raid_log',
		'app.card_group',
		'app.gacha_prob',
		'app.gacha',
		'app.user_gacha_day',
		'app.user_gacha_log',
		'app.user_collect',
		'app.user_cur_stage',
		'app.user_deck',
		'app.user_ev_stage',
		'app.user_login_all_log',
		'app.user_login_day',
		'app.user_login_log',
		'app.user_param',
		'app.user_present_box',
		'app.user_prof',
		'app.user_stage',
		'app.user_tutorial',
		'app.tutorial'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDeckCard = ClassRegistry::init('UserDeckCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDeckCard);

		parent::tearDown();
	}

    /**
     * デッキ登録
     *
     * @author imanishi 
     */
    public function testRegistUserDeckCard() { 
        $userDeckId = 1;

         $list = array(
            array(
                'id' => '1',
                'name' => 'あいり',
                'title' => '[国民的JK]',
                'height' => '154',
                'weight' => '46',
                'size' => 'B84 W56 H83 Cカップ',
                'blood' => 'O型',
                'rare_level' => '3',
                'attr' => '1',
                'hp' => '2000',
                'atk' => '200',
                'def' => '250',
                'skill_id' => '1',
                'words' => 'test',
                'detail' => '名門学園に通う清楚で真面目な学生。とはいっても人並みにそ
っち
    方面への興味もしっかり持っている。',
                'delete_flg' => '0'
            ),
            array(
                'id' => '2',
                'name' => 'あいり',
                'title' => '[国民的JK]',
                'height' => '154',
                'weight' => '46',
                'size' => 'B84 W56 H83 Cカップ',
                'blood' => 'O型',
                'rare_level' => '4',
                'attr' => '1',
                'hp' => '3000',
                'atk' => '250',
                'def' => '350',
                'skill_id' => '1',
                'words' => '私がHな気持ちになればなるほど、強くなるのはわかったけど…私、いやらしい子になっちゃうの…？',
                'detail' => '名門学園に通う清楚で真面目な学生。人好きのするルックスと
体つ
    きに誰もが目を見張ってしまう所も。',
                'delete_flg' => '0'
            ),
        );
        $list = $this->UserDeckCard->regist ($userDeckId, $list); 
    } 
}
