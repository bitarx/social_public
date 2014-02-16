<?php
/**
 * StageProbFixture
 *
 */
class StageProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5, 'comment' => '1:通常クエスト 2:レイドイベントID'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '対象のID'),
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
			'id' => '1',
			'stage_id' => '1',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '28',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'stage_id' => '1',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'stage_id' => '1',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'stage_id' => '2',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '40',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'stage_id' => '2',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'stage_id' => '2',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'stage_id' => '3',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '55',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'stage_id' => '3',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'stage_id' => '3',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '100',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '10',
			'stage_id' => '4',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '53',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '11',
			'stage_id' => '4',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '12',
			'stage_id' => '4',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '150',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '13',
			'stage_id' => '5',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '43',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '14',
			'stage_id' => '5',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '15',
			'stage_id' => '5',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '150',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '16',
			'stage_id' => '6',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '31',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '17',
			'stage_id' => '6',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '18',
			'stage_id' => '6',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '150',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '19',
			'stage_id' => '7',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '46',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '20',
			'stage_id' => '7',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '21',
			'stage_id' => '7',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '200',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '22',
			'stage_id' => '8',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '58',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '23',
			'stage_id' => '8',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '24',
			'stage_id' => '8',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '200',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '25',
			'stage_id' => '9',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '61',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '26',
			'stage_id' => '9',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '27',
			'stage_id' => '9',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '200',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '28',
			'stage_id' => '10',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '49',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '29',
			'stage_id' => '10',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '30',
			'stage_id' => '10',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '250',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '31',
			'stage_id' => '11',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '37',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '32',
			'stage_id' => '11',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '33',
			'stage_id' => '11',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '250',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '34',
			'stage_id' => '12',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '10',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '35',
			'stage_id' => '12',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '36',
			'stage_id' => '12',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '250',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '37',
			'stage_id' => '13',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '13',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '38',
			'stage_id' => '13',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '39',
			'stage_id' => '13',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '300',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '40',
			'stage_id' => '14',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '16',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '41',
			'stage_id' => '14',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '42',
			'stage_id' => '14',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '300',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '43',
			'stage_id' => '15',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '19',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '44',
			'stage_id' => '15',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '45',
			'stage_id' => '15',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '300',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '46',
			'stage_id' => '16',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '22',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '47',
			'stage_id' => '16',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '48',
			'stage_id' => '16',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '350',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '49',
			'stage_id' => '17',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '25',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '50',
			'stage_id' => '17',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '51',
			'stage_id' => '17',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '350',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '52',
			'stage_id' => '18',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '29',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '53',
			'stage_id' => '18',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '54',
			'stage_id' => '18',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '350',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '55',
			'stage_id' => '19',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '32',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '56',
			'stage_id' => '19',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '57',
			'stage_id' => '19',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '400',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '58',
			'stage_id' => '20',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '35',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '59',
			'stage_id' => '20',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '60',
			'stage_id' => '20',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '400',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '61',
			'stage_id' => '21',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '38',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '62',
			'stage_id' => '21',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '63',
			'stage_id' => '21',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '400',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '64',
			'stage_id' => '22',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '41',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '65',
			'stage_id' => '22',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '66',
			'stage_id' => '22',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '450',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '67',
			'stage_id' => '23',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '44',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '68',
			'stage_id' => '23',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '69',
			'stage_id' => '23',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '450',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '70',
			'stage_id' => '24',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '47',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '71',
			'stage_id' => '24',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '72',
			'stage_id' => '24',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '450',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '73',
			'stage_id' => '25',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '50',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '74',
			'stage_id' => '25',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '75',
			'stage_id' => '25',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '500',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '76',
			'stage_id' => '26',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '53',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '77',
			'stage_id' => '26',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '78',
			'stage_id' => '26',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '500',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '79',
			'stage_id' => '27',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '56',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '80',
			'stage_id' => '27',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '81',
			'stage_id' => '27',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '500',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '82',
			'stage_id' => '28',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '59',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '83',
			'stage_id' => '28',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '84',
			'stage_id' => '28',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '550',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '85',
			'stage_id' => '29',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '62',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '86',
			'stage_id' => '29',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '20',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '87',
			'stage_id' => '29',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '550',
			'prob' => '80',
			'delete_flg' => '0'
		),
		array(
			'id' => '88',
			'stage_id' => '30',
			'raid_id' => '0',
			'kind' => '1',
			'target' => '7',
			'num' => '1',
			'prob' => '5',
			'delete_flg' => '0'
		),
		array(
			'id' => '89',
			'stage_id' => '30',
			'raid_id' => '0',
			'kind' => '2',
			'target' => '21',
			'num' => '1',
			'prob' => '15',
			'delete_flg' => '0'
		),
		array(
			'id' => '90',
			'stage_id' => '30',
			'raid_id' => '0',
			'kind' => '3',
			'target' => '0',
			'num' => '600',
			'prob' => '80',
			'delete_flg' => '0'
		),
	);

}
