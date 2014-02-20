<?php
App::uses('UserLoginDay', 'Model');

/**
 * UserLoginDay Test Case
 *
 */
class UserLoginDayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_login_day'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLoginDay = ClassRegistry::init('UserLoginDay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLoginDay);

		parent::tearDown();
	}

    /**
     * ログインデイズ更新日取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetLoginDaysMod() {

        $userId = 1;
        $data = $this->UserLoginDay->getLoginDaysMod($userId);

        $expected = array(
            'modified' => '2014-02-17 21:30:46',
        );

        $this->assertEquals($data['modified'], $expected['modified']);
    }
}
