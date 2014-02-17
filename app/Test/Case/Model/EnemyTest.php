<?php
App::uses('Enemy', 'Model');

/**
 * Enemy Test Case
 *
 */
class EnemyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Enemy = ClassRegistry::init('Enemy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enemy);

		parent::tearDown();
	}

}
