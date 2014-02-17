<?php
App::uses('UserGachaLog', 'Model');

/**
 * UserGachaLog Test Case
 *
 */
class UserGachaLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_gacha_log',
		'app.gacha',
		'app.card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGachaLog = ClassRegistry::init('UserGachaLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGachaLog);

		parent::tearDown();
	}

}
