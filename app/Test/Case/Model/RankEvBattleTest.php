<?php
App::uses('RankEvBattle', 'Model');

/**
 * RankEvBattle Test Case
 *
 */
class RankEvBattleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rank_ev_battle',
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
		$this->RankEvBattle = ClassRegistry::init('RankEvBattle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RankEvBattle);

		parent::tearDown();
	}

}
