<?php
App::uses('Quest', 'Model');

/**
 * Quest Test Case
 *
 */
class QuestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quest'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quest = ClassRegistry::init('Quest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quest);

		parent::tearDown();
	}

    /**
     * クエストデータ取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetEnemyData() {
        $questId = 1;
        $data = $this->Quest->getQuestData($questId);

        $expected = array(
            'quest_id' => '1',
        );

         $this->assertEquals($data['quest_id'], $expected['quest_id']);
    }
}
