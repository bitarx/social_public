<?php
App::uses('RankEvRaid', 'Model');

/**
 * RankEvRaid Test Case
 *
 */
class RankEvRaidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rank_ev_raid',
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
		$this->RankEvRaid = ClassRegistry::init('RankEvRaid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RankEvRaid);

		parent::tearDown();
	}

}
