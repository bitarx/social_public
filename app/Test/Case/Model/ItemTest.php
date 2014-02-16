<?php
App::uses('Item', 'Model');

/**
 * Item Test Case
 *
 */
class ItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item',
		'app.item_effect',
		'app.item_prob'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Item = ClassRegistry::init('Item');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Item);

		parent::tearDown();
	}


    /**
     * カードデータ取得
     *
     * @author imanishi
     * @return void
     */
    public function testGetItemData() {

        $id = 1;
        $data = $this->Item->getItemData($id);

        $expected = array(
            'id' => '1',
            'name' => 'BP回復薬ハーフ',
            'detail' => '現在の最大BPの50%が回復します。',
            'point' => '0',
            'money' => '0',
            'item_effect_id' => '1',
            'box_num' => '0',
            'item_id' => '0',
            'delete_flg' => '0'
        );

         $this->assertEquals($data, $expected);
    }

}
