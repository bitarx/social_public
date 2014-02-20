<?php
App::uses('UserGachaDay', 'Model');

/**
 * UserGachaDay Test Case
 *
 */
class UserGachaDayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_gacha_day',
		'app.gacha'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGachaDay = ClassRegistry::init('UserGachaDay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGachaDay);

		parent::tearDown();
	}


    /**
     * ガチャデイズ更新日取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetGachaDaysMod() {

        $userId = 1;
        $data = $this->UserGachaDay->getGachaDaysMod($userId);

        $expected = array(
            'modified' => '2014-02-17 21:30:45',
        );

        $this->assertEquals($data['modified'], $expected['modified']);
    }
}
