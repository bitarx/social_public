<?php
App::uses('MailList', 'Model');

/**
 * MailList Test Case
 *
 */
class MailListTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mail_list'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailList = ClassRegistry::init('MailList');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailList);

		parent::tearDown();
	}

}
