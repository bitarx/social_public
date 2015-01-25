<?php
App::uses('RaidUserCurEnemy', 'Model');

/**
 * RaidUserCurEnemy Test Case
 *
 */
class RaidUserCurEnemyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_user_cur_enemy',
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
		$this->RaidUserCurEnemy = ClassRegistry::init('RaidUserCurEnemy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidUserCurEnemy);

		parent::tearDown();
	}

}
