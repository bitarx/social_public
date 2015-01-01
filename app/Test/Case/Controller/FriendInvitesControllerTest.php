<?php
App::uses('FriendInvitesController', 'Controller');

/**
 * FriendInvitesController Test Case
 *
 */
class FriendInvitesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.friend_invite',
		'app.user',
		'app.sns_user',
		'app.invite_sns_user',
		'app.user_tutorial',
		'app.tutorial',
		'app.user_param',
		'app.ev_quest'
	);

}
