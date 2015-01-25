<?php
App::uses('RaidPresentLog', 'Model');

/**
 * RaidPresentLog Test Case
 *
 */
class RaidPresentLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_present_log',
		'app.user',
		'app.sns_user',
		'app.raid_master',
		'app.enemy',
		'app.skill',
		'app.raid_damage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RaidPresentLog = ClassRegistry::init('RaidPresentLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidPresentLog);

		parent::tearDown();
	}

}
