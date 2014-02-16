<?php
/**
 * GachaProbFixture
 *
 */
class GachaProbFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '合算した値が分母になる'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_mst_gacha_probs_mst_gachas' => array('column' => 'gacha_id', 'unique' => 0),
			'FK_mst_gacha_probs_mst_cards' => array('column' => 'card_id', 'unique' => 0)
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
			'gacha_id' => '1',
			'card_id' => '28',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'gacha_id' => '1',
			'card_id' => '31',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'gacha_id' => '1',
			'card_id' => '34',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'gacha_id' => '1',
			'card_id' => '37',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'gacha_id' => '1',
			'card_id' => '40',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'gacha_id' => '1',
			'card_id' => '43',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'gacha_id' => '1',
			'card_id' => '46',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'gacha_id' => '1',
			'card_id' => '49',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'gacha_id' => '1',
			'card_id' => '52',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '10',
			'gacha_id' => '1',
			'card_id' => '55',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '11',
			'gacha_id' => '1',
			'card_id' => '58',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '12',
			'gacha_id' => '1',
			'card_id' => '61',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '13',
			'gacha_id' => '1',
			'card_id' => '10',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '14',
			'gacha_id' => '1',
			'card_id' => '13',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '15',
			'gacha_id' => '1',
			'card_id' => '16',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '16',
			'gacha_id' => '1',
			'card_id' => '19',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '17',
			'gacha_id' => '1',
			'card_id' => '22',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '18',
			'gacha_id' => '1',
			'card_id' => '25',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '19',
			'gacha_id' => '1',
			'card_id' => '29',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '20',
			'gacha_id' => '1',
			'card_id' => '32',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '21',
			'gacha_id' => '1',
			'card_id' => '35',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '22',
			'gacha_id' => '1',
			'card_id' => '38',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '23',
			'gacha_id' => '1',
			'card_id' => '41',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '24',
			'gacha_id' => '1',
			'card_id' => '44',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '25',
			'gacha_id' => '1',
			'card_id' => '47',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '26',
			'gacha_id' => '1',
			'card_id' => '50',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '27',
			'gacha_id' => '1',
			'card_id' => '53',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '28',
			'gacha_id' => '1',
			'card_id' => '56',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '29',
			'gacha_id' => '1',
			'card_id' => '59',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '30',
			'gacha_id' => '1',
			'card_id' => '62',
			'prob' => '3',
			'delete_flg' => '0'
		),
		array(
			'id' => '31',
			'gacha_id' => '2',
			'card_id' => '10',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '32',
			'gacha_id' => '2',
			'card_id' => '13',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '33',
			'gacha_id' => '2',
			'card_id' => '16',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '34',
			'gacha_id' => '2',
			'card_id' => '19',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '35',
			'gacha_id' => '2',
			'card_id' => '22',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '36',
			'gacha_id' => '2',
			'card_id' => '25',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '37',
			'gacha_id' => '2',
			'card_id' => '29',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '38',
			'gacha_id' => '2',
			'card_id' => '32',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '39',
			'gacha_id' => '2',
			'card_id' => '35',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '40',
			'gacha_id' => '2',
			'card_id' => '38',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '41',
			'gacha_id' => '2',
			'card_id' => '41',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '42',
			'gacha_id' => '2',
			'card_id' => '44',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '43',
			'gacha_id' => '2',
			'card_id' => '47',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '44',
			'gacha_id' => '2',
			'card_id' => '50',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '45',
			'gacha_id' => '2',
			'card_id' => '53',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '46',
			'gacha_id' => '2',
			'card_id' => '56',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '47',
			'gacha_id' => '2',
			'card_id' => '59',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '48',
			'gacha_id' => '2',
			'card_id' => '62',
			'prob' => '10',
			'delete_flg' => '0'
		),
		array(
			'id' => '49',
			'gacha_id' => '2',
			'card_id' => '1',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '50',
			'gacha_id' => '2',
			'card_id' => '4',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '51',
			'gacha_id' => '2',
			'card_id' => '7',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '52',
			'gacha_id' => '2',
			'card_id' => '11',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '53',
			'gacha_id' => '2',
			'card_id' => '14',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '54',
			'gacha_id' => '2',
			'card_id' => '17',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '55',
			'gacha_id' => '2',
			'card_id' => '20',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '56',
			'gacha_id' => '2',
			'card_id' => '23',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '57',
			'gacha_id' => '2',
			'card_id' => '26',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '58',
			'gacha_id' => '2',
			'card_id' => '30',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '59',
			'gacha_id' => '2',
			'card_id' => '33',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '60',
			'gacha_id' => '2',
			'card_id' => '36',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '61',
			'gacha_id' => '2',
			'card_id' => '39',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '62',
			'gacha_id' => '2',
			'card_id' => '42',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '63',
			'gacha_id' => '2',
			'card_id' => '45',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '64',
			'gacha_id' => '2',
			'card_id' => '48',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '65',
			'gacha_id' => '2',
			'card_id' => '51',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '66',
			'gacha_id' => '2',
			'card_id' => '54',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '67',
			'gacha_id' => '2',
			'card_id' => '57',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '68',
			'gacha_id' => '2',
			'card_id' => '60',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '69',
			'gacha_id' => '2',
			'card_id' => '63',
			'prob' => '4',
			'delete_flg' => '0'
		),
		array(
			'id' => '70',
			'gacha_id' => '2',
			'card_id' => '2',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '71',
			'gacha_id' => '2',
			'card_id' => '5',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '72',
			'gacha_id' => '2',
			'card_id' => '8',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '73',
			'gacha_id' => '2',
			'card_id' => '12',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '74',
			'gacha_id' => '2',
			'card_id' => '15',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '75',
			'gacha_id' => '2',
			'card_id' => '18',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '76',
			'gacha_id' => '2',
			'card_id' => '21',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '77',
			'gacha_id' => '2',
			'card_id' => '24',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '78',
			'gacha_id' => '2',
			'card_id' => '27',
			'prob' => '2',
			'delete_flg' => '0'
		),
		array(
			'id' => '79',
			'gacha_id' => '2',
			'card_id' => '3',
			'prob' => '1',
			'delete_flg' => '0'
		),
		array(
			'id' => '80',
			'gacha_id' => '2',
			'card_id' => '6',
			'prob' => '1',
			'delete_flg' => '0'
		),
		array(
			'id' => '81',
			'gacha_id' => '2',
			'card_id' => '9',
			'prob' => '1',
			'delete_flg' => '0'
		),
	);

}
