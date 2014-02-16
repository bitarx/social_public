<?php
/**
 * EvStageProbFixture
 *
 */
class EvStageProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '対象のID'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '数量'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_ev_stage_probs_ev_stages' => array('column' => 'ev_stage_id', 'unique' => 0)
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
			'id' => '1',
			'ev_stage_id' => '1',
			'kind' => '1',
			'target' => '37',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'ev_stage_id' => '1',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'ev_stage_id' => '1',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'ev_stage_id' => '2',
			'kind' => '1',
			'target' => '43',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'ev_stage_id' => '2',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'ev_stage_id' => '2',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'ev_stage_id' => '3',
			'kind' => '1',
			'target' => '52',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'ev_stage_id' => '3',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'ev_stage_id' => '3',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
	);

}
