<?php
App::uses('TmpSendMe', 'Model');

/**
 * TmpSendMe Test Case
 *
 */
class TmpSendMeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tmp_send_me'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TmpSendMe = ClassRegistry::init('TmpSendMe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TmpSendMe);

		parent::tearDown();
	}

}
