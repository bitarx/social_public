<?php
App::uses('MailTxt', 'Model');

/**
 * MailTxt Test Case
 *
 */
class MailTxtTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mail_txt'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailTxt = ClassRegistry::init('MailTxt');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailTxt);

		parent::tearDown();
	}

}
