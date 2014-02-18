<?php
App::uses('UserDeckCard', 'Model');

/**
 * UserDeckCard Test Case
 *
 */
class UserDeckCardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
     * デッキ登録
     *
     * @author imanishi
     */
    public function testRegistUserDeckCard() {
        $userDeckId = 1;

         $list = array(
            array(
                'user_card_id' => '1',
            ),
            array(
                'user_card_id' => '2',
            ),
        );
        $list = $this->UserDeckCard->regist ($userDeckId, $list);
    }
}
