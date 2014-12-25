<?php
App::uses('EvBattleLog', 'Model');

/**
 * EvBattleLog Test Case
 *
 */
class EvBattleLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_battle_log',
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
		$this->EvBattleLog = ClassRegistry::init('EvBattleLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvBattleLog);

		parent::tearDown();
	}

}
