<?php
App::uses('UserBox', 'Model');

/**
 * UserBox Test Case
 *
 */
class UserBoxTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_box',
		'app.user_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserBox = ClassRegistry::init('UserBox');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserBox);

		parent::tearDown();
	}

}
