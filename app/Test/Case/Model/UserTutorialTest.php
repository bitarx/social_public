<?php
App::uses('UserTutorial', 'Model');

/**
 * UserTutorial Test Case
 *
 */
class UserTutorialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_tutorial',
		'app.tutorial'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserTutorial = ClassRegistry::init('UserTutorial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserTutorial);

		parent::tearDown();
	}

}
