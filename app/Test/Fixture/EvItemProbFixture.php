<?php
/**
 * EvItemProbFixture
 *
 */
class EvItemProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ev_item_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '同一item_idの合算が分母'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '1:card 2:item 3:money'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_item_prob_id', 'unique' => 1),
			'FK_ev_item_probs_items' => array('column' => 'item_id', 'unique' => 0)
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
			'ev_item_prob_id' => '1',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '2',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '3',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '3',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '2',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '4',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '1',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '5',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '6',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '3',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '7',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '2',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '8',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '1',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '9',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '10',
			'item_id' => '20',
			'ev_stage_id' => '1',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2000',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '11',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '12',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '3',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '13',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '2',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '14',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '1',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '15',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '16',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '3',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '17',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '2',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '18',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '1',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '19',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '20',
			'item_id' => '20',
			'ev_stage_id' => '2',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2000',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '21',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '22',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '5',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '23',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '4',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '24',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '3',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '25',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '26',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '5',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '27',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '4',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '28',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '3',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '29',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '2',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'ev_item_prob_id' => '30',
			'item_id' => '21',
			'ev_stage_id' => '3',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '3000',
			'delete_flg' => '0'
		),
	);

}
