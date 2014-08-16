<?php
App::uses('UserCollect', 'Model');

/**
 * UserCollect Test Case
 *
 */
class UserCollectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_collect',
		'app.card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserCollect = ClassRegistry::init('UserCollect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserCollect);

		parent::tearDown();
	}

}
