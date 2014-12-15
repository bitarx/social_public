<?php
App::uses('UserEvolLog', 'Model');

/**
 * UserEvolLog Test Case
 *
 */
class UserEvolLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_evol_log',
		'app.user',
		'app.sns_user',
		'app.base_card',
		'app.target_card',
		'app.after_card'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserEvolLog = ClassRegistry::init('UserEvolLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserEvolLog);

		parent::tearDown();
	}

}
