<?php
App::uses('UserGachaDay', 'Model');

/**
 * UserGachaDay Test Case
 *
 */
class UserGachaDayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_gacha_day',
		'app.gacha'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGachaDay = ClassRegistry::init('UserGachaDay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGachaDay);

		parent::tearDown();
	}

}
