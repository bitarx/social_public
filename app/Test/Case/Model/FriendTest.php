<?php
App::uses('Friend', 'Model');

/**
 * Friend Test Case
 *
 */
class FriendTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.friend',
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
		$this->Friend = ClassRegistry::init('Friend');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Friend);

		parent::tearDown();
	}

}
