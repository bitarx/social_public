<?php
/**
 * ItemProbFixture
 *
 */
class ItemProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'item_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '同一item_idの合算が分母'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '1:card 2:item 3:money'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_prob_id', 'unique' => 1),
			'FK_mst_item_probs_mst_items' => array('column' => 'item_id', 'unique' => 0),
			'FK_item_probs_stages' => array('column' => 'stage_id', 'unique' => 0)
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
			'item_prob_id' => '1',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '2',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '2',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '3',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '1',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '4',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '0',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '5',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '6',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '2',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '7',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '1',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '8',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '0',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '9',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '0',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '10',
			'item_id' => '20',
			'stage_id' => '1',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '11',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '12',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '2',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '13',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '1',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '14',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '0',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '15',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '16',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '2',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '17',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '1',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '18',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '0',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '19',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '0',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '20',
			'item_id' => '20',
			'stage_id' => '2',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '21',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '22',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '3',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '23',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '2',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '24',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '1',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '25',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '26',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '3',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '27',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '2',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '28',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '1',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '29',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '30',
			'item_id' => '21',
			'stage_id' => '3',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '31',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '32',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '3',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '33',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '2',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '34',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '1',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '35',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '36',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '3',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '37',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '2',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '38',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '1',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '39',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '40',
			'item_id' => '20',
			'stage_id' => '4',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1200',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '41',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '42',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '3',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '43',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '2',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '44',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '1',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '45',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '46',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '3',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '47',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '2',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '48',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '1',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '49',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '50',
			'item_id' => '20',
			'stage_id' => '5',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1200',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '51',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '52',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '4',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '53',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '3',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '54',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '2',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '55',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '56',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '4',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '57',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '3',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '58',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '2',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '59',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '60',
			'item_id' => '21',
			'stage_id' => '6',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '61',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '62',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '4',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '63',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '3',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '64',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '2',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '65',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '66',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '4',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '67',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '3',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '68',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '2',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '69',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '70',
			'item_id' => '20',
			'stage_id' => '7',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '71',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '72',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '4',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '73',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '3',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '74',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '2',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '75',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '76',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '4',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '77',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '3',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '78',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '2',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '79',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '1',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '80',
			'item_id' => '20',
			'stage_id' => '8',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '1500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '81',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '82',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '5',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '83',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '4',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '84',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '3',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '85',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '86',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '5',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '87',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '4',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '88',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '3',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '89',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '2',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '90',
			'item_id' => '21',
			'stage_id' => '9',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '91',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '92',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '5',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '93',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '4',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '94',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '3',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '95',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '96',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '5',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '97',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '4',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '98',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '3',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '99',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '2',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '100',
			'item_id' => '20',
			'stage_id' => '10',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '101',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '102',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '5',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '103',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '4',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '104',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '3',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '105',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '106',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '5',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '107',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '4',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '108',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '3',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '109',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '2',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '110',
			'item_id' => '20',
			'stage_id' => '11',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '111',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '112',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '6',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '113',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '5',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '114',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '4',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '115',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '116',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '6',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '117',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '5',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '118',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '4',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '119',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '3',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '120',
			'item_id' => '21',
			'stage_id' => '12',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '3000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '121',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '122',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '6',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '123',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '5',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '124',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '4',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '125',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '126',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '6',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '127',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '5',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '128',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '4',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '129',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '3',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '130',
			'item_id' => '20',
			'stage_id' => '13',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '131',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '132',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '6',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '133',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '5',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '134',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '4',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '135',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '136',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '6',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '137',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '5',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '138',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '4',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '139',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '3',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '140',
			'item_id' => '20',
			'stage_id' => '14',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '2500',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '141',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '142',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '7',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '143',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '6',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '144',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '5',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '145',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '146',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '7',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '147',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '6',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '148',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '5',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '149',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '4',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '150',
			'item_id' => '21',
			'stage_id' => '15',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '4000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '151',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '152',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '7',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '153',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '6',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '154',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '5',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '155',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '156',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '7',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '157',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '6',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '158',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '5',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '159',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '4',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '160',
			'item_id' => '20',
			'stage_id' => '16',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '3000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '161',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '162',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '7',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '163',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '6',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '164',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '5',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '165',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '166',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '7',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '167',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '6',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '168',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '5',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '169',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '4',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '170',
			'item_id' => '20',
			'stage_id' => '17',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '3000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '171',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '172',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '8',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '173',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '7',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '174',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '6',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '175',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '176',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '8',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '177',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '7',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '178',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '6',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '179',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '5',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '180',
			'item_id' => '21',
			'stage_id' => '18',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '5000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '181',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '182',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '8',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '183',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '7',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '184',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '6',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '185',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '186',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '8',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '187',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '7',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '188',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '6',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '189',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '5',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '190',
			'item_id' => '20',
			'stage_id' => '19',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '4000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '191',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '192',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '8',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '193',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '7',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '194',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '6',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '195',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '196',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '8',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '197',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '7',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '198',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '6',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '199',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '5',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '200',
			'item_id' => '20',
			'stage_id' => '20',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '4000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '201',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '202',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '9',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '203',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '8',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '204',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '7',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '205',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '206',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '9',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '207',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '8',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '208',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '7',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '209',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '6',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '210',
			'item_id' => '21',
			'stage_id' => '21',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '6000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '211',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '212',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '9',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '213',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '8',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '214',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '7',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '215',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '216',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '9',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '217',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '8',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '218',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '7',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '219',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '6',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '220',
			'item_id' => '20',
			'stage_id' => '22',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '5000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '221',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '222',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '9',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '223',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '8',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '224',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '7',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '225',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '226',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '9',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '227',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '8',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '228',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '7',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '229',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '6',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '230',
			'item_id' => '20',
			'stage_id' => '23',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '5000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '231',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '232',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '10',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '233',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '9',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '234',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '8',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '235',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '236',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '10',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '237',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '9',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '238',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '8',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '239',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '7',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '240',
			'item_id' => '21',
			'stage_id' => '24',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '8000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '241',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '242',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '10',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '243',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '9',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '244',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '8',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '245',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '246',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '10',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '247',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '9',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '248',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '8',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '249',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '7',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '250',
			'item_id' => '20',
			'stage_id' => '25',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '7000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '251',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '252',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '10',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '253',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '9',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '254',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '8',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '255',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '256',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '10',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '257',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '9',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '258',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '8',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '259',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '7',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '260',
			'item_id' => '20',
			'stage_id' => '26',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '7000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '261',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '262',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '11',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '263',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '10',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '264',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '9',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '265',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '266',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '11',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '267',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '10',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '268',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '9',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '269',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '8',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '270',
			'item_id' => '21',
			'stage_id' => '27',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '10000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '271',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '272',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '11',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '273',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '10',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '274',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '9',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '275',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '276',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '11',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '277',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '10',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '278',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '9',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '279',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '8',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '280',
			'item_id' => '20',
			'stage_id' => '28',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '8000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '281',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '282',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '11',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '283',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '10',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '284',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '9',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '285',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '286',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '11',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '287',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '10',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '288',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '9',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '289',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '8',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '290',
			'item_id' => '20',
			'stage_id' => '29',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '8000',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '291',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '20',
			'kind' => '2',
			'target' => '1',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '292',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '12',
			'kind' => '2',
			'target' => '2',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '293',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '11',
			'kind' => '2',
			'target' => '3',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '294',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '10',
			'kind' => '2',
			'target' => '4',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '295',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '20',
			'kind' => '2',
			'target' => '5',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '296',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '12',
			'kind' => '2',
			'target' => '6',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '297',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '11',
			'kind' => '2',
			'target' => '7',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '298',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '10',
			'kind' => '2',
			'target' => '8',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '299',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '9',
			'kind' => '2',
			'target' => '9',
			'num' => '1',
			'delete_flg' => '0'
		),
		array(
			'item_prob_id' => '300',
			'item_id' => '21',
			'stage_id' => '30',
			'prob' => '20',
			'kind' => '3',
			'target' => '0',
			'num' => '15000',
			'delete_flg' => '0'
		),
	);

}
