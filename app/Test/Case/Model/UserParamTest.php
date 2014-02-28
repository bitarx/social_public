<?php
App::uses('UserParam', 'Model');

/**
 * UserParam Test Case
 *
 */
class UserParamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_param'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserParam = ClassRegistry::init('UserParam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserParam);

		parent::tearDown();
	}

    /**
     * ユーザステータス取得
     *
     * @author imanishi 
     */
    public function testGetUserParams() {

        $userId = 1;
        $data = $this->UserParam->getUserParams($userId);

        $expected = array(
            'act_max' => 1
        ,   'user_id' => 1
        );
        $this->assertEquals($data['act_max'], $expected['act_max']);
        $this->assertEquals($data['user_id'], $expected['user_id']);
    }

    /**
     * 対戦一覧を取得するメソッドを確認
     *
     * @author imanishi 
     */
    public function testGetBattleList() {

        $userId = 1;
        $data = $this->UserParam->getBattleList($userId);

        $expected = array(

            array(
                'user_id' => 2,
                'level' => 2,
            ),
            array(
                'user_id' => 3,
                'level' => 2,
            ),
        );
        $this->assertEquals($data[0]['user_id'], $expected[0]['user_id']);
        $this->assertEquals($data[0]['level'], $expected[0]['level']);
        $this->assertEquals($data[1]['user_id'], $expected[1]['user_id']);
        $this->assertEquals($data[1]['level'], $expected[1]['level']);
    }


   /**
    * ユーザステータス登録メソッドをテスト
    * @author imanishi 
    */
   public function testSetUserParams () { 
       $userId = 1;
       $data = array(
           'money' => 300
       );
       $ret = $this->UserParam->setUserParams($userId, $data);
       $this->assertNotEmpty($ret['UserParam']);
   }
}
