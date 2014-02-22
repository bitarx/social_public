<?php
App::uses('UserGachaLog', 'Model');

/**
 * UserGachaLog Test Case
 *
 */
class UserGachaLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_gacha_log',
		'app.gacha',
		'app.card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGachaLog = ClassRegistry::init('UserGachaLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGachaLog);

		parent::tearDown();
	}



    /**
     * がチャログデータ取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetGachaLogData() {

        $id = 1;
        $data = $this->UserGachaLog->getGachaLogData($id);

        $expected = array(
            'id' => 1,
            'gacha_id' => 1,
            'card_id' => 1,
            'end_flg' => 1,
            'delete_flg' => 0,
            'created' => '2014-02-17 21:30:45',
            'modified' => '2014-02-17 21:30:45'
        );

         $this->assertEquals($data['gacha_id'], $expected['gacha_id']);
    }

}
