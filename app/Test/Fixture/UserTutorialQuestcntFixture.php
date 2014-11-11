<?php
/**
 * UserTutorialQuestcntFixture
 *
 */
class UserTutorialQuestcntFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cnt' => array('type' => 'integer', 'null' => false, 'default' => null),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_id' => 1,
			'cnt' => 1,
			'delete_flg' => 1,
			'created' => '2014-08-31 14:24:08'
		),
	);

}
