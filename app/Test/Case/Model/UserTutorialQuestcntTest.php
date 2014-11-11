<?php
App::uses('UserTutorialQuestcnt', 'Model');

/**
 * UserTutorialQuestcnt Test Case
 *
 */
class UserTutorialQuestcntTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_tutorial_questcnt'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserTutorialQuestcnt = ClassRegistry::init('UserTutorialQuestcnt');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserTutorialQuestcnt);

		parent::tearDown();
	}

}
