<?php
/**
 * CardGroupFixture
 *
 */
class CardGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'card_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'evol_group' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'prev' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '前の進化のcard_group_id'),
		'next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => '次の進化のcard_group_id'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'card_group_id', 'unique' => 1),
			'group_id' => array('column' => 'evol_group', 'unique' => 0),
			'FK_card_groups_cards' => array('column' => 'card_id', 'unique' => 0)
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
			'card_group_id' => '1',
			'evol_group' => '1',
			'card_id' => '1',
			'prev' => '0',
			'next' => '2',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '2',
			'evol_group' => '1',
			'card_id' => '2',
			'prev' => '1',
			'next' => '3',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '3',
			'evol_group' => '1',
			'card_id' => '3',
			'prev' => '2',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '4',
			'evol_group' => '2',
			'card_id' => '4',
			'prev' => '0',
			'next' => '5',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '5',
			'evol_group' => '2',
			'card_id' => '5',
			'prev' => '4',
			'next' => '6',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '6',
			'evol_group' => '2',
			'card_id' => '6',
			'prev' => '5',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '7',
			'evol_group' => '3',
			'card_id' => '7',
			'prev' => '0',
			'next' => '8',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '8',
			'evol_group' => '3',
			'card_id' => '8',
			'prev' => '7',
			'next' => '9',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '9',
			'evol_group' => '3',
			'card_id' => '9',
			'prev' => '8',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '10',
			'evol_group' => '4',
			'card_id' => '10',
			'prev' => '0',
			'next' => '11',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '11',
			'evol_group' => '4',
			'card_id' => '11',
			'prev' => '10',
			'next' => '12',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '12',
			'evol_group' => '4',
			'card_id' => '12',
			'prev' => '11',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '13',
			'evol_group' => '5',
			'card_id' => '13',
			'prev' => '0',
			'next' => '14',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '14',
			'evol_group' => '5',
			'card_id' => '14',
			'prev' => '13',
			'next' => '15',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '15',
			'evol_group' => '5',
			'card_id' => '15',
			'prev' => '14',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '16',
			'evol_group' => '6',
			'card_id' => '16',
			'prev' => '0',
			'next' => '17',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '17',
			'evol_group' => '6',
			'card_id' => '17',
			'prev' => '16',
			'next' => '18',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '18',
			'evol_group' => '6',
			'card_id' => '18',
			'prev' => '17',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '19',
			'evol_group' => '7',
			'card_id' => '19',
			'prev' => '0',
			'next' => '20',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '20',
			'evol_group' => '7',
			'card_id' => '20',
			'prev' => '19',
			'next' => '21',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '21',
			'evol_group' => '7',
			'card_id' => '21',
			'prev' => '20',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '22',
			'evol_group' => '8',
			'card_id' => '22',
			'prev' => '0',
			'next' => '23',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '23',
			'evol_group' => '8',
			'card_id' => '23',
			'prev' => '22',
			'next' => '24',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '24',
			'evol_group' => '8',
			'card_id' => '24',
			'prev' => '23',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '25',
			'evol_group' => '9',
			'card_id' => '25',
			'prev' => '0',
			'next' => '26',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '26',
			'evol_group' => '9',
			'card_id' => '26',
			'prev' => '25',
			'next' => '27',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '27',
			'evol_group' => '9',
			'card_id' => '27',
			'prev' => '26',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '28',
			'evol_group' => '10',
			'card_id' => '28',
			'prev' => '0',
			'next' => '29',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '29',
			'evol_group' => '10',
			'card_id' => '29',
			'prev' => '28',
			'next' => '30',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '30',
			'evol_group' => '10',
			'card_id' => '30',
			'prev' => '29',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '31',
			'evol_group' => '11',
			'card_id' => '31',
			'prev' => '0',
			'next' => '32',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '32',
			'evol_group' => '11',
			'card_id' => '32',
			'prev' => '31',
			'next' => '33',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '33',
			'evol_group' => '11',
			'card_id' => '33',
			'prev' => '32',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '34',
			'evol_group' => '12',
			'card_id' => '34',
			'prev' => '0',
			'next' => '35',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '35',
			'evol_group' => '12',
			'card_id' => '35',
			'prev' => '34',
			'next' => '36',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '36',
			'evol_group' => '12',
			'card_id' => '36',
			'prev' => '35',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '37',
			'evol_group' => '13',
			'card_id' => '37',
			'prev' => '0',
			'next' => '38',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '38',
			'evol_group' => '13',
			'card_id' => '38',
			'prev' => '37',
			'next' => '39',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '39',
			'evol_group' => '13',
			'card_id' => '39',
			'prev' => '38',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '40',
			'evol_group' => '14',
			'card_id' => '40',
			'prev' => '0',
			'next' => '41',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '41',
			'evol_group' => '14',
			'card_id' => '41',
			'prev' => '40',
			'next' => '42',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '42',
			'evol_group' => '14',
			'card_id' => '42',
			'prev' => '41',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '43',
			'evol_group' => '15',
			'card_id' => '43',
			'prev' => '0',
			'next' => '44',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '44',
			'evol_group' => '15',
			'card_id' => '44',
			'prev' => '43',
			'next' => '45',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '45',
			'evol_group' => '15',
			'card_id' => '45',
			'prev' => '44',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '46',
			'evol_group' => '16',
			'card_id' => '46',
			'prev' => '0',
			'next' => '47',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '47',
			'evol_group' => '16',
			'card_id' => '47',
			'prev' => '46',
			'next' => '48',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '48',
			'evol_group' => '16',
			'card_id' => '48',
			'prev' => '47',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '49',
			'evol_group' => '17',
			'card_id' => '49',
			'prev' => '0',
			'next' => '50',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '50',
			'evol_group' => '17',
			'card_id' => '50',
			'prev' => '49',
			'next' => '51',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '51',
			'evol_group' => '17',
			'card_id' => '51',
			'prev' => '50',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '52',
			'evol_group' => '18',
			'card_id' => '52',
			'prev' => '0',
			'next' => '53',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '53',
			'evol_group' => '18',
			'card_id' => '53',
			'prev' => '52',
			'next' => '54',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '54',
			'evol_group' => '18',
			'card_id' => '54',
			'prev' => '53',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '55',
			'evol_group' => '19',
			'card_id' => '55',
			'prev' => '0',
			'next' => '56',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '56',
			'evol_group' => '19',
			'card_id' => '56',
			'prev' => '55',
			'next' => '57',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '57',
			'evol_group' => '19',
			'card_id' => '57',
			'prev' => '56',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '58',
			'evol_group' => '20',
			'card_id' => '58',
			'prev' => '0',
			'next' => '59',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '59',
			'evol_group' => '20',
			'card_id' => '59',
			'prev' => '58',
			'next' => '60',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '60',
			'evol_group' => '20',
			'card_id' => '60',
			'prev' => '59',
			'next' => '0',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '61',
			'evol_group' => '21',
			'card_id' => '61',
			'prev' => '0',
			'next' => '62',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '62',
			'evol_group' => '21',
			'card_id' => '62',
			'prev' => '61',
			'next' => '63',
			'delete_flg' => '0'
		),
		array(
			'card_group_id' => '63',
			'evol_group' => '21',
			'card_id' => '63',
			'prev' => '62',
			'next' => '0',
			'delete_flg' => '0'
		),
	);

}
