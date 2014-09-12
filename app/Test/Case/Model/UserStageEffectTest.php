<?php
App::uses('UserStageEffect', 'Model');

/**
 * UserStageEffect Test Case
 *
 */
class UserStageEffectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_stage_effect',
		'app.user',
		'app.sns_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserStageEffect = ClassRegistry::init('UserStageEffect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserStageEffect);

		parent::tearDown();
	}

}
