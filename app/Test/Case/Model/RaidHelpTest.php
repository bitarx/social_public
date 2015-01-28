<?php
App::uses('RaidHelp', 'Model');

/**
 * RaidHelp Test Case
 *
 */
class RaidHelpTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.raid_help'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RaidHelp = ClassRegistry::init('RaidHelp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RaidHelp);

		parent::tearDown();
	}

}
