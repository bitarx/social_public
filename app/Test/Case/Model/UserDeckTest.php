<?php
App::uses('UserDeck', 'Model');

/**
 * UserDeck Test Case
 *
 */
class UserDeckTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_deck',
		'app.user',
		'app.sns_user',
		'app.user_deck_card',
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
		$this->UserDeck = ClassRegistry::init('UserDeck');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDeck);

		parent::tearDown();
	}

}
