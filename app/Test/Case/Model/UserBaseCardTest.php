<?php
App::uses('UserBaseCard', 'Model');

/**
 * UserBaseCard Test Case
 *
 */
class UserBaseCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_base_card',
		'app.user',
		'app.sns_user',
		'app.user_card',
		'app.card',
		'app.card_group',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserBaseCard = ClassRegistry::init('UserBaseCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserBaseCard);

		parent::tearDown();
	}


    /**
     * ユーザのベースカード取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetUserBaseCard() {
        $userId = 1;
        $data = $this->UserBaseCard->getUserBaseCardData($userId);

         $expected = array(
            'user_card_id' => 1
         ,  'card_id' => 1
         );
         $this->assertEquals($data['user_card_id'], $expected['user_card_id']);
         $this->assertEquals($data['card_id'], $expected['card_id']);
    }
}
