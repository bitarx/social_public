<?php
App::uses('UserCard', 'Model');

/**
 * UserCard Test Case
 *
 */
class UserCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_card',
		'app.user',
		'app.sns_user',
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
		$this->UserCard = ClassRegistry::init('UserCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserCard);

		parent::tearDown();
	}

}
