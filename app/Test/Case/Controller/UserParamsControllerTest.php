<?php
App::uses('UserParamsController', 'Controller');

/**
 * UserParamsController Test Case
 *
 */
class UserParamsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_param',
		'app.sns_user',
		'app.user',
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
		'app.user_deck_card',
		'app.user_deck',
		'app.user_ev_stage',
		'app.user_login_all_log',
		'app.user_login_day',
		'app.user_login_log',
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
          $ret = $this->testAction('/user_params/index/');
          debug($ret);
	}


/**
 * testAct method
 *
 * @return void
 */
    public function testAct() {
          $ret = $this->testAction('/user_params/act/?target_id=1');
          debug($ret);
    }

/**
 * testProduct method
 *
 * @return void
 */
    public function testProduct() {
          $ret = $this->testAction('/user_params/product/');
          debug($ret);
    }

/**
 * testComp method
 *
 * @return void
 */
    public function testComp() {
          $ret = $this->testAction('/user_params/comp/');
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
