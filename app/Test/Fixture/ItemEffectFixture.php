<?php
/**
 * ItemEffectFixture
 *
 */
class ItemEffectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'item_effect_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'item_effect_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => '使用前の説明', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => '使用後の説明', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:act 2:bp 3.カード出現率アップ 4.金庫出現率アップ 5.クエストの全力進行アップ'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '回復の割合'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_effect_id', 'unique' => 1)
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
			'item_effect_id' => '1',
			'item_effect_detail' => '最大BPの50%が回復します。',
			'detail_after' => '最大BPの50%が回復しました！',
			'effect' => '2',
			'percent' => '50',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '2',
			'item_effect_detail' => 'BPが全回復します。',
			'detail_after' => 'BPが全回復しました！',
			'effect' => '2',
			'percent' => '100',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '3',
			'item_effect_detail' => '最大体力の50%が回復します。',
			'detail_after' => '最大体力の50%が回復しました！',
			'effect' => '1',
			'percent' => '50',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '4',
			'item_effect_detail' => '体力が全回復します。',
			'detail_after' => '体力が全回復しました！',
			'effect' => '1',
			'percent' => '100',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '5',
			'item_effect_detail' => '使用後30分間、クエストのカード出現率がアップします。',
			'detail_after' => '30分間、クエストのカード出現率がアップします！',
			'effect' => '3',
			'percent' => '0',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '6',
			'item_effect_detail' => '使用後30分間、クエストの金庫出現率がアップします。',
			'detail_after' => '30分間、クエストの金庫出現率がアップします！',
			'effect' => '4',
			'percent' => '0',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '7',
			'item_effect_detail' => '使用後30分間、クエストの全力進行出現率がアップします。',
			'detail_after' => '30分間、クエストの全力進行出現率がアップします！',
			'effect' => '5',
			'percent' => '0',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '8',
			'item_effect_detail' => '使用すると中身がプレゼントボックスに振り込まれます。',
			'detail_after' => '以下のアイテムがプレゼントボックスに振り込まれました！',
			'effect' => '6',
			'percent' => '0',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '9',
			'item_effect_detail' => '使用すると以下の中身がプレゼントボックスに振り込まれます。',
			'detail_after' => '以下のアイテムがプレゼントボックスに振り込まれました！',
			'effect' => '6',
			'percent' => '0',
			'delete_flg' => '0'
		),
		array(
			'item_effect_id' => '99',
			'item_effect_detail' => '効果なし',
			'detail_after' => '効果なし',
			'effect' => '0',
			'percent' => '0',
			'delete_flg' => '0'
		),
	);

}
