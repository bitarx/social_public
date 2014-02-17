<?php
App::uses('Gacha', 'Model');

/**
 * Gacha Test Case
 *
 */
class GachaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gacha'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gacha = ClassRegistry::init('Gacha');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gacha);

		parent::tearDown();
	}

}
