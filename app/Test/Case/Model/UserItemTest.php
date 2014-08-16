<?php
App::uses('UserItem', 'Model');

/**
 * UserItem Test Case
 *
 */
class UserItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_item',
		'app.user',
		'app.sns_user',
		'app.item',
		'app.item_effect',
		'app.user_box'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserItem = ClassRegistry::init('UserItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserItem);

		parent::tearDown();
	}

/**
 * testRegistItem method
 *
 * @return void
 */
	public function testRegistItem() {
	}

}
