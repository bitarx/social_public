<?php
App::uses('UserRaidLog', 'Model');

/**
 * UserRaidLog Test Case
 *
 */
class UserRaidLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_raid_log',
		'app.user',
		'app.sns_user',
		'app.user_raid',
		'app.raid',
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
		$this->UserRaidLog = ClassRegistry::init('UserRaidLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserRaidLog);

		parent::tearDown();
	}

}
