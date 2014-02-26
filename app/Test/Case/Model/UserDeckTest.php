<?php
App::uses('UserDeck', 'Model');

/**
 * UserDeck Test Case
 *
 */
class UserDeckTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_deck',
		'app.user',
		'app.sns_user',
		'app.user_deck_card',
		'app.card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDeck = ClassRegistry::init('UserDeck');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDeck);

		parent::tearDown();
	}


    /**
     * ユーザデッキ情報取得メソッドを確認
     *
     * @author imanishi
     */
    public function testGetUserDeckData() {

         $userId = 1;
         $kind = 1;
         $data = $this->UserDeck->getUserDeckData($userId, $kind);
         $expected = array(
            'user_deck_id' => 1,
            'user_id' => 1,
            array('user_card_id' => 1 )
         );
         $this->assertEquals($data[0]['user_card_id'], $expected[0]['user_card_id']);
         $this->assertEquals($data['user_deck_id'], $expected['user_deck_id']);
         $this->assertEquals($data['user_id'], $expected['user_id']);
    }
}
