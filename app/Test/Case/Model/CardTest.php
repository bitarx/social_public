<?php
App::uses('Card', 'Model');

/**
 * Card Test Case
 *
 */
class CardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.user',
		'app.sns_user',
		'app.battle_log',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
		'app.user_card',
		'app.user_collect',
		'app.user_cur_stage',
		'app.user_deck_card',
		'app.user_deck',
		'app.user_ev_stage',
		'app.user_gacha_day',
		'app.gacha',
		'app.gacha_prob',
		'app.user_gacha_log',
		'app.user_login_all_log',
		'app.user_login_day',
		'app.user_login_log',
		'app.user_param',
		'app.user_present_box',
		'app.user_prof',
		'app.user_raid_log',
		'app.user_stage',
		'app.user_tutorial',
		'app.tutorial',
		'app.card_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Card = ClassRegistry::init('Card');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Card);

		parent::tearDown();
	}

    /**
     * カードデータ取得
     *
     * @author imanishi 
     * @return void
     */
     public function testGetCardData() { 

         $id = 1;
         $data = $this->Card->getCardData($id);

         $expected = array(
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
             'detail' => '名門学園に通う清楚で真面目な学生。とはいっても人並みにそっち方面への興味もしっかり持っている。',
             'delete_flg' => '0'
         );

         $this->assertEquals($data, $expected);
     } 

    /**
     * 初期カードデータ取得
     *
     * @author imanishi 
     * @return void
     */
     public function testGetStartCardList() { 

         // カード枚数
         $num = 2;

         $data = $this->Card->getStartCardList();
         $retNum = count($data);

         $this->assertEquals($retNum, $num);
     } 
}
