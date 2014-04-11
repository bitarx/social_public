<?php
App::uses('Card', 'Model');

/**
 * Card Test Case
 *
 */
class CardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Card = ClassRegistry::init('Card');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Card);

		parent::tearDown();
	}

/**
 * testGetCardData method
 *
 * @return void
 */
	public function testGetCardData() {

         $id = 1;
         $data = $this->Card->getCardData($id);

         $expected = array(
             'card_id' => '1',
             'card_name' => 'あいり',
             'card_title' => '[国民的JK]',
             'height' => '154',
             'weight' => '46',
             'size' => 'B84 W56 H83 Cカップ',
             'blood' => 'O型',
             'rare_level' => '3',
             'attr' => '1',
             'card_hp' => '2000',
             'card_atk' => '200',
             'card_def' => '250',
             'card_level' => '20',
             'skill_id' => '1',
             'card_words' => 'test',
             'card_detail' => '名門学園に通う清楚で真面目な学生。とはいっても人並みにそっち方面への興味もしっかり持っている。',
            'delete_flg' => '0',
            'skill_id' => '1',
            'skill_name' => 'アフタースクール',
            'effect' => '1',
            'updown' => '1',
            'target' => '3',
            'percent' => '35',
            'skill_words' => '味方の防御力を大アップ',
         );

         $this->assertEquals($data, $expected);
	}

/**
 * testGetStartCardList method
 *
 * @return void
 */
	public function testGetStartCardList() {

         // カード枚数
         $num = 2;

         $data = $this->Card->getStartCardList();
         $retNum = count($data);

         $this->assertEquals($retNum, $num);
	}

}
