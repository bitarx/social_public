<?php
App::uses('UserDeckCard', 'Model');

/**
 * UserDeck Test Case
 *
 */
class UserDeckCardTest extends CakeTestCase {

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
		'app.user_card',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDeckCard = ClassRegistry::init('UserDeckCard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDeckCard);

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
         $data = $this->UserDeckCard->getUserDeckData($userId, $kind);

         $expected = array(
            'user_deck_id' => 1,
            'user_id' => 1,
            'user_card_id' => 1,
            'skill_id' => 1,
            'effect' => 1,
         );
         $this->assertEquals($data[0]['user_card_id'], $expected['user_card_id']);
         $this->assertEquals($data[0]['user_deck_id'], $expected['user_deck_id']);
         $this->assertEquals($data[0]['user_id'], $expected['user_id']);
         $this->assertEquals($data[0]['skill_id'], $expected['skill_id']);
         $this->assertEquals($data[0]['effect'], $expected['effect']);
    }
}
