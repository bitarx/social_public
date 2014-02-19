<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

    /**
     * 取得したアイテム等を登録するメソッド確認
     *
     * @author imanishi 
     */
    public function testRegistGetData() { 
        
        $targetId = 1;
        $userId = 1;

        // カード
        $kind = 1;
        $num = 2;
        $ret = $this->User->registGetData($userId, $kind, $targetId, $num);
        $this->assertTrue($ret);

        // アイテム
        $kind = 2;
        $num = 2;
        $ret = $this->User->registGetData($userId, $kind, $targetId, $num);
//        $this->assertTrue($ret);

        // お金
        $kind = 3;
        $ret = $this->User->registGetData($userId, $kind, $targetId);
//        $this->assertTrue($ret);
    } 
}
