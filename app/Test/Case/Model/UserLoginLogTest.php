<?php
App::uses('UserLoginLog', 'Model');

/**
 * UserLoginLog Test Case
 *
 */
class UserLoginLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_login_log',
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
		$this->UserLoginLog = ClassRegistry::init('UserLoginLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLoginLog);

		parent::tearDown();
	}


    /**
     * ログインログリスト取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetLoginLogData() {

        $userId = 1;
        $list = $this->UserLoginLog->getLoginLogList($userId);

        $expected[] = array(
            'id' => 1,
            'user_id' => 1,
            'kind' => 1,
            'target' => 1,
            'delete_flg' => 0,
            'created' => '2014-02-17 21:30:46',
            'modified' => '2014-02-17 21:30:46'
        );

         $this->assertEquals($list[0]['kind'], $expected[0]['kind']);
    }
}
