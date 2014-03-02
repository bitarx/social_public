<?php
App::uses('GachaProb', 'Model');

/**
 * GachaProb Test Case
 *
 */
class GachaProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gacha_prob',
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
		$this->GachaProb = ClassRegistry::init('GachaProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GachaProb);

		parent::tearDown();
	}


    /**
     * ガチャ確率リスト取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetGachaProbList() {

        $gachaId = 1;
        $list = $this->GachaProb->getGachaProbList($gachaId);

        $expected[] = array(
            'gacha_prob_id' => '1',
        );
        $expected[] = array(
            'gacha_prob_id' => '30',
        );

         $this->assertEquals($list[0]['gacha_prob_id'], $expected[0]['gacha_prob_id']);
         $this->assertEquals($list[29]['gacha_prob_id'], $expected[1]['gacha_prob_id']);
    }

}
