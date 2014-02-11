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
                    'id' => 1,
                    'title' => 'Lorem ipsum dolor sit amet',
                    'words' => 'Lorem ipsum dolor sit amet',
                    'words2' => 'Lorem ipsum dolor sit amet',
                    'words3' => 'Lorem ipsum dolor sit amet',
                    'next' => 1
         );
         $this->assertEquals($data, $expected);
     } 
}
