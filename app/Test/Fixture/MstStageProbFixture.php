<?php
/**
 * MstStageProbFixture
 *
 */
class MstStageProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5, 'comment' => '1:通常クエスト 2以上レイドイベントID'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '対象のID'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '数量'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'stage_id' => array('column' => 'stage_id', 'unique' => 0)
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
			'id' => 1,
			'stage_id' => 1,
			'raid_id' => 1,
			'kind' => 1,
			'target_id' => 1,
			'num' => 1,
			'prob' => 1,
			'delete_flg' => 1
		),
	);

}
