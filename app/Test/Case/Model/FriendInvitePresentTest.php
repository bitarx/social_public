<?php
App::uses('FriendInvitePresent', 'Model');

/**
 * FriendInvitePresent Test Case
 *
 */
class FriendInvitePresentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.friend_invite_present'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FriendInvitePresent = ClassRegistry::init('FriendInvitePresent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FriendInvitePresent);

		parent::tearDown();
	}

}
