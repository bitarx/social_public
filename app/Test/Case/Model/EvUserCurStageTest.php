<?php
App::uses('EvUserCurStage', 'Model');

/**
 * EvUserCurStage Test Case
 *
 */
class EvUserCurStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_user_cur_stage',
		'app.ev_stage',
		'app.ev_quest',
		'app.enemy',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvUserCurStage = ClassRegistry::init('EvUserCurStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvUserCurStage);

		parent::tearDown();
	}

}
