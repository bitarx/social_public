<?php
App::uses('UserDeckCard', 'Model');

/**
 * UserDeckCard Test Case
 *
 */
class UserDeckCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_deck_card',
		'app.user_deck',
		'app.user',
		'app.sns_user',
		'app.user_card',
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
		$this->UserDeckCard = ClassRegistry::init('UserDeckCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDeckCard);

		parent::tearDown();
	}

}
