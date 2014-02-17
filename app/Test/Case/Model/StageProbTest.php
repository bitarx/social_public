<?php
App::uses('StageProb', 'Model');

/**
 * StageProb Test Case
 *
 */
class StageProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stage_prob',
		'app.stage',
		'app.quest',
		'app.enemy',
		'app.skill',
		'app.raid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StageProb = ClassRegistry::init('StageProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StageProb);

		parent::tearDown();
	}

}
