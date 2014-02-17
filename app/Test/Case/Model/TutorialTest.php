<?php
App::uses('Tutorial', 'Model');

/**
 * Tutorial Test Case
 *
 */
class TutorialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tutorial'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tutorial = ClassRegistry::init('Tutorial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tutorial);

		parent::tearDown();
	}


    /**
     * マスタデータ取得を確認
     *
     * @author imanishi
     */
     public function testGetTutorialData () {
         $id = 1;
         $data = $this->Tutorial->getMstData($id);

         $expected = array(
            'tutorial_id' => '1',
            'tutorial_title' => 'オープニング',
            'tutorial_words' => '',
            'tutorial_words2' => '',
            'tutorial_words3' => '',
            'tutorial_next' => '2',
         );
         $this->assertEquals($data, $expected);
     }
}
