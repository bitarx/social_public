<?php
App::uses('EvQuest', 'Model');

/**
 * EvQuest Test Case
 *
 */
class EvQuestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_quest'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvQuest = ClassRegistry::init('EvQuest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvQuest);

		parent::tearDown();
	}

}
