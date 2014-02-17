<?php
App::uses('UserLoginDay', 'Model');

/**
 * UserLoginDay Test Case
 *
 */
class UserLoginDayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_login_day'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLoginDay = ClassRegistry::init('UserLoginDay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLoginDay);

		parent::tearDown();
	}

}
