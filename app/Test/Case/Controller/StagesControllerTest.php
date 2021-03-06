<?php
App::uses('StagesController', 'Controller');

/**
 * StagesController Test Case
 *
 */
class StagesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

        $ret = $this->testAction('/stages/index/?quest_id=1');
        debug($ret);
	}

/**
 * testMain method
 *
 * @return void
 */
	public function testMain() {

        $ret = $this->testAction('/stages/main/?stage_id=1');
        debug($ret);
	}

/**
 * testConff method
 *
 * @return void
 */
	public function testConf() {

        $ret = $this->testAction('/stages/conf/?stage_id=1');
        debug($ret);
	}

/**
 * testAct method
 *
 * @return void
 */
	public function testAct() {

        $ret = $this->testAction('/stages/act/?target_id=1');
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
