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
