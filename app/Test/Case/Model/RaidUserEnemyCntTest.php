<?php
App::uses('RaidUserEnemyCnt', 'Model');

/**
 * RaidUserEnemyCnt Test Case
 *
 */
class RaidUserEnemyCntTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_user_enemy_cnt',
		'app.user',
		'app.sns_user',
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
		$this->RaidUserEnemyCnt = ClassRegistry::init('RaidUserEnemyCnt');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidUserEnemyCnt);

		parent::tearDown();
	}

}
