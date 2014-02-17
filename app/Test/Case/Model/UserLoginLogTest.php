<?php
App::uses('UserLoginLog', 'Model');

/**
 * UserLoginLog Test Case
 *
 */
class UserLoginLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_login_log',
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
		$this->UserLoginLog = ClassRegistry::init('UserLoginLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLoginLog);

		parent::tearDown();
	}

}
