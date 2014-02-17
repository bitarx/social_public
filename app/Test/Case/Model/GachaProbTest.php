<?php
App::uses('GachaProb', 'Model');

/**
 * GachaProb Test Case
 *
 */
class GachaProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gacha_prob',
		'app.gacha',
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
		$this->GachaProb = ClassRegistry::init('GachaProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GachaProb);

		parent::tearDown();
	}

}
