<?php
App::uses('EvStageProb', 'Model');

/**
 * EvStageProb Test Case
 *
 */
class EvStageProbTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ev_stage_prob',
		'app.ev_stage',
		'app.ev_quest',
		'app.enemy',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvStageProb = ClassRegistry::init('EvStageProb');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvStageProb);

		parent::tearDown();
	}


    /**
     * ステージアイテム抽選確率取得メソッドをテスト
     *
     * @author imanishi
     */
    public function testGetStageProb() {
        $evStageId = 1;
        $data = $this->EvStageProb->getEvStageProb($evStageId);

        $expected[0] = array(
            'kind' => 1
        ,   'target' => 37 
        );
        $this->assertEquals($data[0]['kind'], $expected[0]['kind']);
        $this->assertEquals($data[0]['target'], $expected[0]['target']);
    }
}
