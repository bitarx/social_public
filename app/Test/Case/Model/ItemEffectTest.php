<?php
App::uses('ItemEffect', 'Model');

/**
 * ItemEffect Test Case
 *
 */
class ItemEffectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_effect',
		'app.item',
		'app.item_prob',
		'app.target'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemEffect = ClassRegistry::init('ItemEffect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemEffect);

		parent::tearDown();
	}

}
