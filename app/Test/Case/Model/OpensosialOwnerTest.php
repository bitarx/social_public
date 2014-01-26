<?php
App::uses('OpensosialOwner', 'Model');

/**
 * OpensosialOwner Test Case
 *
 */
class OpensosialOwnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.opensosial_owner',
		'app.viewer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OpensosialOwner = ClassRegistry::init('OpensosialOwner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OpensosialOwner);

		parent::tearDown();
	}

}
