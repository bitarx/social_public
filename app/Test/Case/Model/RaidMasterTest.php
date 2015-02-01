<?php
App::uses('RaidMaster', 'Model');

/**
 * RaidMaster Test Case
 *
 */
class RaidMasterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_master',
		'app.user',
		'app.sns_user',
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
		$this->RaidMaster = ClassRegistry::init('RaidMaster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidMaster);

		parent::tearDown();
	}

}
