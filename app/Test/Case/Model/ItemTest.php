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
		'app.item_effect'
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
            'item_id' => '1',
            'item_name' => 'BP回復薬ハーフ',
        );

         $this->assertEquals($data, $expected);
    }


}
