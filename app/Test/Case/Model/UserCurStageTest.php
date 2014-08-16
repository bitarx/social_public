<?php
App::uses('UserCurStage', 'Model');

/**
 * UserCurStage Test Case
 *
 */
class UserCurStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_cur_stage',
		'app.stage',
		'app.quest',
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
		$this->UserCurStage = ClassRegistry::init('UserCurStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserCurStage);

		parent::tearDown();
	}

}
