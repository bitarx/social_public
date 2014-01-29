<?php
App::uses('SnsUser', 'Model');

/**
 * SnsUser Test Case
 *
 */
class SnsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sns_user',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SnsUser = ClassRegistry::init('SnsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SnsUser);

		parent::tearDown();
	}

}
