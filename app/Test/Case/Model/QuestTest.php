<?php
App::uses('Quest', 'Model');

/**
 * Quest Test Case
 *
 */
class QuestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quest'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quest = ClassRegistry::init('Quest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quest);

		parent::tearDown();
	}

}
