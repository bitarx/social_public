<?php
App::uses('UserCollect', 'Model');

/**
 * UserCollect Test Case
 *
 */
class UserCollectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_collect',
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
		'app.user_cur_stage',
		'app.user_deck_card',
		'app.deck',
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
		$this->UserCollect = ClassRegistry::init('UserCollect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserCollect);

		parent::tearDown();
	}

}
