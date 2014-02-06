<?php
App::uses('ItemProb', 'Model');

/**
 * ItemProb Test Case
 *
 */
class ItemProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_prob',
		'app.item',
		'app.item_effect',
		'app.target'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemProb = ClassRegistry::init('ItemProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemProb);

		parent::tearDown();
	}

}
