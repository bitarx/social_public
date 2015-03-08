<?php
App::uses('EvRaidRankFirst', 'Model');

/**
 * EvRaidRankFirst Test Case
 *
 */
class EvRaidRankFirstTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_raid_rank_first'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvRaidRankFirst = ClassRegistry::init('EvRaidRankFirst');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvRaidRankFirst);

		parent::tearDown();
	}

}
