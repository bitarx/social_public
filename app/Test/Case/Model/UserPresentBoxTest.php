<?php
App::uses('UserPresentBox', 'Model');

/**
 * UserPresentBox Test Case
 *
 */
class UserPresentBoxTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_present_box',
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
		$this->UserPresentBox = ClassRegistry::init('UserPresentBox');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserPresentBox);

		parent::tearDown();
	}

}
