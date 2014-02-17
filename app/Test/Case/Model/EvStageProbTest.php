<?php
App::uses('EvStageProb', 'Model');

/**
 * EvStageProb Test Case
 *
 */
class EvStageProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_stage_prob',
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
		$this->EvStageProb = ClassRegistry::init('EvStageProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvStageProb);

		parent::tearDown();
	}

}
