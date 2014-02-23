<?php
App::uses('UserEvStage', 'Model');

/**
 * UserEvStage Test Case
 *
 */
class UserEvStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_ev_stage',
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
		$this->UserEvStage = ClassRegistry::init('UserEvStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserEvStage);

		parent::tearDown();
	}


    /**
     * ユーザのイベントクエスト進捗取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetUserEvStage() {
        $userId = 1;
        $data = $this->UserEvStage->getUserEvStage($userId);

         $expected[] = array(
            'ev_stage_id' => 1
         );
         $this->assertEquals($data[0]['ev_stage_id'], $expected[0]['ev_stage_id']);
    }
}
