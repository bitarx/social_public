<?php
App::uses('UserParam', 'Model');

/**
 * UserParam Test Case
 *
 */
class UserParamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_param'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserParam = ClassRegistry::init('UserParam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserParam);

		parent::tearDown();
	}

}
