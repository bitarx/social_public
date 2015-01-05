<?php
App::uses('FriendInvite', 'Model');

/**
 * FriendInvite Test Case
 *
 */
class FriendInviteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.friend_invite',
		'app.user',
		'app.sns_user',
		'app.invite_sns_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FriendInvite = ClassRegistry::init('FriendInvite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FriendInvite);

		parent::tearDown();
	}

}
