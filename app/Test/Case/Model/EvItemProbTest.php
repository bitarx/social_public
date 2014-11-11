<?php
App::uses('EvItemProb', 'Model');

/**
 * EvItemProb Test Case
 *
 */
class EvItemProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_item_prob',
		'app.item',
		'app.item_effect',
		'app.ev_stage',
		'app.ev_quest',
		'app.enemy',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvItemProb = ClassRegistry::init('EvItemProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvItemProb);

		parent::tearDown();
	}

}
