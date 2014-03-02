<?php
App::uses('Gacha', 'Model');

/**
 * Gacha Test Case
 *
 */
class GachaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gacha'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gacha = ClassRegistry::init('Gacha');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gacha);

		parent::tearDown();
	}


    /**
     * ガチャ一覧取得メソッドを確認
     *
     * @author imanishi 
     */
    public function testGetGachaList() {

        $list = $this->Gacha->getList();


        $expected[] = array(
                'gacha_id' => '1',
                'gacha_name' => 'ノーマルガチャ',
                'gacha_detail' => '',
                'start_time' => '0000-00-00 00:00:00',
                'end_time' => '3000-00-00 00:00:00',
                'delete_flg' => '0'
         );
         $this->assertEquals($list, $expected);
     }
}
