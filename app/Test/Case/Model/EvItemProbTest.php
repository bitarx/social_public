<?php
App::uses('EvItemProb', 'Model');

/**
 * EvItemProb Test Case
 *
 */
class EvItemProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_item_prob',
		'app.item',
		'app.item_effect',
		'app.item_prob',
		'app.stage',
		'app.quest',
		'app.enemy',
		'app.skill',
		'app.card',
		'app.card_group',
		'app.gacha_prob',
		'app.gacha',
		'app.user_gacha_day',
		'app.user_gacha_log',
		'app.user_collect',
		'app.ev_stage',
		'app.ev_quest',
		'app.ev_stage_prob',
		'app.user_raid',
		'app.raid',
		'app.stage_prob',
		'app.user_raid_log',
		'app.user',
		'app.sns_user',
		'app.battle_log',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
		'app.user_card',
		'app.user_cur_stage',
		'app.user_deck_card',
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
		$this->EvItemProb = ClassRegistry::init('EvItemProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvItemProb);

		parent::tearDown();
	}

}
