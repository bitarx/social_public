<?php
App::uses('UserFirstItem', 'Model');

/**
 * UserFirstItem Test Case
 *
 */
class UserFirstItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_first_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserFirstItem = ClassRegistry::init('UserFirstItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserFirstItem);

		parent::tearDown();
	}

}
