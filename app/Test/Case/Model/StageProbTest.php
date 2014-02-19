<?php
App::uses('StageProb', 'Model');

/**
 * StageProb Test Case
 *
 */
class StageProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stage_prob',
		'app.stage',
		'app.quest',
		'app.enemy',
		'app.skill',
		'app.raid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StageProb = ClassRegistry::init('StageProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StageProb);

		parent::tearDown();
	}

    /**
     * ステージアイテム抽選確率取得メソッドをテスト
     *
     * @author imanishi 
     */
    public function testGetStageProb() { 
        $stageId = 1;
        $data = $this->StageProb->getStageProb($stageId); 

        $expected[0] = array(
            'kind' => 1
        ,   'target' => 28 
        );
        $this->assertEquals($data[0]['kind'], $expected[0]['kind']);
        $this->assertEquals($data[0]['target'], $expected[0]['target']);
    } 
}
