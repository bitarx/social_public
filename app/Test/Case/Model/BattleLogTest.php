<?php
App::uses('BattleLog', 'Model');

/**
 * BattleLog Test Case
 *
 */
class BattleLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.battle_log',
		'app.user',
		'app.sns_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BattleLog = ClassRegistry::init('BattleLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BattleLog);

		parent::tearDown();
	}

}
