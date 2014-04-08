<?php
App::uses('CardGroup', 'Model');

/**
 * CardGroup Test Case
 *
 */
class CardGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.card_group',
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
		$this->CardGroup = ClassRegistry::init('CardGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CardGroup);

		parent::tearDown();
	}


    /**
     * 進化情報を取得するメソッドを確認
     *
     * @author imanishi
     */
    public function testGetCardGroup() {

         $cardId = 1;
         $data = $this->CardGroup->getCardGroup($cardId);
         $expected = array(
            'prev' => 0,
            'next' => 2
         );
         $this->assertEquals($data['prev'], $expected['prev']);
         $this->assertEquals($data['next'], $expected['next']);
    }

    /**
     * 同じカードグループにあるか判定するメソッドを確認
     *
     * @author imanishi
     */
    public function testJudgeSameCardGroup() {

         $baseCardId = 1;
         $targetCardId = 3;
         $ret = $this->CardGroup->judgeSameCardGroup($baseCardId, $targetCardId);
         $this->assertTrue($ret);

         $baseCardId = 1;
         $targetCardId = 8;
         $ret = $this->CardGroup->judgeSameCardGroup($baseCardId, $targetCardId);
         $this->assertFalse($ret);

    }
}
