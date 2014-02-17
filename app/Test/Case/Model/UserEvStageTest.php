<?php
App::uses('UserEvStage', 'Model');

/**
 * UserEvStage Test Case
 *
 */
class UserEvStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_ev_stage',
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
		$this->UserEvStage = ClassRegistry::init('UserEvStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserEvStage);

		parent::tearDown();
	}

}
