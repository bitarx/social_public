<?php
App::uses('UserCardsController', 'Controller');

/**
 * UserCardsController Test Case
 *
 */
class UserBaseCardsControllerTest extends ControllerTestCase {

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

        $ret = $this->testAction('/user_base_cards/index/');
        debug($ret);
	}


}
