<?php
App::uses('RaidDamage', 'Model');

/**
 * RaidDamage Test Case
 *
 */
class RaidDamageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_damage',
		'app.user',
		'app.sns_user',
		'app.raid_master',
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
		$this->RaidDamage = ClassRegistry::init('RaidDamage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidDamage);

		parent::tearDown();
	}

}
