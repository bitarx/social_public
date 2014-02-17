<?php
App::uses('CardGroup', 'Model');

/**
 * CardGroup Test Case
 *
 */
class CardGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.card_group',
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
		$this->CardGroup = ClassRegistry::init('CardGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CardGroup);

		parent::tearDown();
	}

}
