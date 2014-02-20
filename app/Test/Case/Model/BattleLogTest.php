<?php
App::uses('BattleLog', 'Model');

/**
 * BattleLog Test Case
 *
 */
class BattleLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.battle_log',
		'app.user',
		'app.sns_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BattleLog = ClassRegistry::init('BattleLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BattleLog);

		parent::tearDown();
	}


    /**
     * バトルログリスト取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetBattleLogList() {

        $userId = 1;
        $list = $this->BattleLog->getBattleLogList($userId);

        $expected[] = array(
            'id' => '2',
            'target_user' => '2',
        );

         $this->assertEquals($list[0]['id'], $expected[0]['id']);
         $this->assertEquals($list[0]['target_user'], $expected[0]['target_user']);
    }

    /**
     * バトルログデータ取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetBattleLogData() {

        $id = 1;
        $data = $this->BattleLog->getBattleLogData($id);

        $expected = array(
            'id' => '1',
            'target_user' => '1'
        );

         $this->assertEquals($data['id'], $expected['id']);
         $this->assertEquals($data['target_user'], $expected['target_user']);
    }

    /**
     * バトルログデータ登録更新メソッドを確認
     *
     * @author imanishi
     */
    public function testInitBattleLogData() {

        $values = array(
           'id' => 1
        ,  'user_id' =>  1    
        ,  'target_user' =>  1    
        ,  'result' =>  1    
        ,  'log' =>  '{"id":1}'    
        );
        $ret = $this->BattleLog->initBattleLogData($values);

         $this->assertNotEmpty($ret['BattleLog']);
    }
}
