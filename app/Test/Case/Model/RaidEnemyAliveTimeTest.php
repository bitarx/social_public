<?php
App::uses('RaidEnemyAliveTime', 'Model');

/**
 * RaidEnemyAliveTime Test Case
 *
 */
class RaidEnemyAliveTimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_enemy_alive_time',
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
		$this->RaidEnemyAliveTime = ClassRegistry::init('RaidEnemyAliveTime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidEnemyAliveTime);

		parent::tearDown();
	}

}
