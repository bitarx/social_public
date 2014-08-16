<?php
App::uses('Error', 'Model');

/**
 * Error Test Case
 *
 */
class ErrorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.error'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Error = ClassRegistry::init('Error');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Error);

		parent::tearDown();
	}

}
