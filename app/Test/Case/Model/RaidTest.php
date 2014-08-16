<?php
App::uses('Raid', 'Model');

/**
 * Raid Test Case
 *
 */
class RaidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Raid = ClassRegistry::init('Raid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Raid);

		parent::tearDown();
	}

}
