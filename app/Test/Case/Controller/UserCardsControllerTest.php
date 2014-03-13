<?php
App::uses('UserCardsController', 'Controller');

/**
 * UserCardsController Test Case
 *
 */
class UserCardsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_card',
		'app.user_base_card',
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
		'app.user',
		'app.sns_user',
		'app.battle_log',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
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
		'app.user_stage',
		'app.user_tutorial',
		'app.tutorial',
		'app.card_group'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

        $ret = $this->testAction('/user_cards/index/');
        debug($ret);
	}

/**
 * testConf method
 *
 * @return void
 */
	public function testConf() {

        $ret = $this->testAction('/user_cards/conf/?user_card_id=1');
        debug($ret);
	}

/**
 * testActEvol method
 *
 * @return void
 */
	public function testActEvol() {

        $ret = $this->testAction('/user_cards/actEvol/?user_card_id=1');
        debug($ret);
	}

/**
 * testActUp method
 *
 * @return void
 */
	public function testActUp() {

        $ret = $this->testAction('/user_cards/actUp/?user_card_id=1');
        debug($ret);
	}

/**
 * testFind method
 *
 * @return void
 */
	public function testFind() {
	}

/**
 * testInit method
 *
 * @return void
 */
	public function testInit() {
	}

}
