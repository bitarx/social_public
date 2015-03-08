<?php
App::uses('EvRaidRankSecond', 'Model');

/**
 * EvRaidRankSecond Test Case
 *
 */
class EvRaidRankSecondTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_raid_rank_second'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvRaidRankSecond = ClassRegistry::init('EvRaidRankSecond');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvRaidRankSecond);

		parent::tearDown();
	}

}
