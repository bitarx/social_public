<?php
App::uses('EvPresent', 'Model');

/**
 * EvPresent Test Case
 *
 */
class EvPresentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_present',
		'app.ev_quest'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvPresent = ClassRegistry::init('EvPresent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvPresent);

		parent::tearDown();
	}

}
