<?php
App::uses('UserLastBpTime', 'Model');

/**
 * UserLastBpTime Test Case
 *
 */
class UserLastBpTimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_last_bp_time',
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
		$this->UserLastBpTime = ClassRegistry::init('UserLastBpTime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLastBpTime);

		parent::tearDown();
	}

}
