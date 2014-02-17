<?php
App::uses('UserProf', 'Model');

/**
 * UserProf Test Case
 *
 */
class UserProfTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_prof'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserProf = ClassRegistry::init('UserProf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserProf);

		parent::tearDown();
	}

}
