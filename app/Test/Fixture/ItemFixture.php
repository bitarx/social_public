<?php
/**
 * ItemFixture
 *
 */
class ItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'item_effect_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'box_num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '0以上でボックスアイテムの当選個数'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index', 'comment' => 'ボックスアイテムの場合開ける為に必要なアイテム'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_items_items' => array('column' => 'item_effect_id', 'unique' => 0),
			'FK_items' => array('column' => 'item_id', 'unique' => 0)
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
			'name' => 'BP回復薬ハーフ',
			'detail' => '現在の最大BPの50%が回復します。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '1',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '2',
			'name' => 'BP回復薬',
			'detail' => 'BPが全回復します。',
			'point' => '100',
			'money' => '0',
			'item_effect_id' => '2',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '3',
			'name' => 'BP回復薬6個セット',
			'detail' => 'お得セット！通常600ポイントのところ６個セットで500コイン！',
			'point' => '500',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '6',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '4',
			'name' => 'BP回復薬13個セット',
			'detail' => '超お得セット！通常1300ポイントのところ13個セットで1000コイン！',
			'point' => '1000',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '13',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '5',
			'name' => '体力回復薬ハーフ',
			'detail' => '現在の最大体力の50%が回復します。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '3',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '6',
			'name' => '体力回復薬',
			'detail' => '体力が全回復します。',
			'point' => '100',
			'money' => '0',
			'item_effect_id' => '4',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '7',
			'name' => '体力回復薬6個セット',
			'detail' => 'お得セット！通常600ポイントのところ６個セットで500ポイント！',
			'point' => '500',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '6',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '8',
			'name' => '体力回復薬13個セット',
			'detail' => '超お得セット！通常1300ポイントのところ13個セットで1000ポイント！',
			'point' => '1000',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '13',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '9',
			'name' => 'ガチャチケット',
			'detail' => 'プレミアムガチャを引くことができます。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '99',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '10',
			'name' => '初心者限定セット',
			'detail' => 'プレミアムガチャチケット１枚、体力回復薬１個、BP回復薬１個のお得な限定セットが100ポイント！（お１人様１セットのみ購入可能）',
			'point' => '100',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '3',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '11',
			'name' => '幸の香水',
			'detail' => '使用後30分間、クエストのカード出現率がアップします。',
			'point' => '100',
			'money' => '0',
			'item_effect_id' => '5',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '12',
			'name' => '幸の香水6個セット',
			'detail' => 'お得セット！通常600ポイントのところ６個セットで500ポイント！',
			'point' => '500',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '6',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '13',
			'name' => '幸の香水13個セット',
			'detail' => '超お得セット！通常1300ポイントのところ13個セットで1000ポイント！',
			'point' => '1000',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '13',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '14',
			'name' => '財の香水',
			'detail' => '使用後30分間、クエストの金庫出現率がアップします。',
			'point' => '50',
			'money' => '0',
			'item_effect_id' => '6',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '15',
			'name' => '財の香水6個セット',
			'detail' => 'お得セット！通常300ポイントのところ６個セットで200ポイント！',
			'point' => '250',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '6',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '16',
			'name' => '財の香水13個セット',
			'detail' => '超お得セット！通常650ポイントのところ13個セットで500ポイント！',
			'point' => '500',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '13',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '17',
			'name' => '進行の香水',
			'detail' => '使用後30分間、クエストの全力進行出現率がアップします。',
			'point' => '50',
			'money' => '0',
			'item_effect_id' => '7',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '18',
			'name' => '進行の香水6個セット',
			'detail' => 'お得セット！通常300ポイントのところ６個セットで200ポイント！',
			'point' => '250',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '6',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '19',
			'name' => '進行の香水13個セット',
			'detail' => '超お得セット！通常650ポイントのところ13個セットで500ポイント！',
			'point' => '500',
			'money' => '0',
			'item_effect_id' => '8',
			'box_num' => '13',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '20',
			'name' => '金の金庫',
			'detail' => 'カードやアイテムが入っている。金の金庫の鍵で開けることができる。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '9',
			'box_num' => '10',
			'item_id' => '23',
			'delete_flg' => '0'
		),
		array(
			'id' => '21',
			'name' => '銀の金庫',
			'detail' => 'カードやアイテムが入っている。銀の金庫の鍵で開けることができる。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '9',
			'box_num' => '5',
			'item_id' => '24',
			'delete_flg' => '0'
		),
		array(
			'id' => '22',
			'name' => 'ダンボールの箱',
			'detail' => '集めるとよいことがあるかもしれません。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '99',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '23',
			'name' => '金の金庫の鍵',
			'detail' => '金の金庫を開けることができる。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '99',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
		array(
			'id' => '24',
			'name' => '銀の金庫の鍵',
			'detail' => '銀の金庫を開けることができる。',
			'point' => '0',
			'money' => '0',
			'item_effect_id' => '99',
			'box_num' => '0',
			'item_id' => '0',
			'delete_flg' => '0'
		),
	);

}
