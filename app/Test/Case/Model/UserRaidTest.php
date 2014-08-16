<?php
App::uses('UserRaid', 'Model');

/**
 * UserRaid Test Case
 *
 */
class UserRaidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_raid',
		'app.user',
		'app.sns_user',
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
		$this->UserRaid = ClassRegistry::init('UserRaid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserRaid);

		parent::tearDown();
	}

}
