<?php
App::uses('EvStage', 'Model');

/**
 * EvStage Test Case
 *
 */
class EvStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_stage',
		'app.ev_quest',
		'app.enemy',
		'app.skill',
		'app.card',
		'app.card_group',
		'app.group',
		'app.gacha_prob',
		'app.gacha',
		'app.user_gacha_day',
		'app.user',
		'app.sns_user',
		'app.battle_log',
		'app.user_target',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
		'app.user_card',
		'app.user_collect',
		'app.user_cur_stage',
		'app.stage',
		'app.quest',
		'app.stage_prob',
		'app.raid',
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
		'app.user_raid_log',
		'app.user_raid',
		'app.user_stage',
		'app.user_tutorial',
		'app.tutorial',
		'app.user_gacha_log',
		'app.ev_stage_prob'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvStage = ClassRegistry::init('EvStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvStage);

		parent::tearDown();
	}

}
