<?php
App::uses('UserItemsController', 'Controller');

/**
 * UserItemsController Test Case
 *
 */
class UserItemsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_item',
		'app.user',
		'app.sns_user',
		'app.item',
		'app.item_effect',
		'app.user_box',
		'app.user_tutorial',
		'app.tutorial'
	);

}
