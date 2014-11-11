<?php
App::uses('UserLastActTime', 'Model');

/**
 * UserLastActTime Test Case
 *
 */
class UserLastActTimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_last_act_time'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLastActTime = ClassRegistry::init('UserLastActTime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLastActTime);

		parent::tearDown();
	}

}
