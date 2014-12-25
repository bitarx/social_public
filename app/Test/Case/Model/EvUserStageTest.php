<?php
App::uses('EvUserStage', 'Model');

/**
 * EvUserStage Test Case
 *
 */
class EvUserStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_user_stage',
		'app.user',
		'app.sns_user',
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
		$this->EvUserStage = ClassRegistry::init('EvUserStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvUserStage);

		parent::tearDown();
	}

}
