<?php
App::uses('UserStage', 'Model');

/**
 * UserStage Test Case
 *
 */
class UserStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_stage',
		'app.stage',
		'app.quest',
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
		$this->UserStage = ClassRegistry::init('UserStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserStage);

		parent::tearDown();
	}

    /**
     * ユーザのクエスト進捗取得メソッドを確認
     *
     * @author imanishi 
     */
    public function testGetUserStage() {
        $userId = 1;
        $data = $this->UserStage->getUserStage($userId, $stageId = 0); 

         $expected[] = array(
            'stage_id' => 1
         );
         $this->assertEquals($data[0]['stage_id'], $expected[0]['stage_id']);

        $data = $this->UserStage->getUserStage($userId, $stageId = 1); 
         
         $expected = array(
            'stage_id' => 1
         );
         $this->assertEquals($data['stage_id'], $expected['stage_id']);
    } 

    /**
     * ユーザのステージ進捗更新メソッドを確認
     *
     * @author imanishi 
     */
    public function testInitUserStage() {
        $data = array(
            'user_id'  => 1
        ,   'stage_id' => 1
        ,   'progress' => 20
        ,   'state'    => 2
        );
        $ret = $this->UserStage->initUserStage($data); 

         $this->assertTrue($ret);
    } 
}
