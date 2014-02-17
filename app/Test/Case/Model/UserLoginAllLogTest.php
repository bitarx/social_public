<?php
App::uses('UserLoginAllLog', 'Model');

/**
 * UserLoginAllLog Test Case
 *
 */
class UserLoginAllLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_login_all_log',
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
		$this->UserLoginAllLog = ClassRegistry::init('UserLoginAllLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLoginAllLog);

		parent::tearDown();
	}

}
