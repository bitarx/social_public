<?php
App::uses('Enemy', 'Model');

/**
 * Enemy Test Case
 *
 */
class EnemyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enemy',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enemy = ClassRegistry::init('Enemy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enemy);

		parent::tearDown();
	}

    /**
     * 敵データ取得メソッドを確認
     *
     * @author imanishi 
     */
    public function testGetEnemyData() { 
        $enemyId = 1; 
        $data = $this->Enemy->getEnemyData($enemyId);

        $expected = array(
            'enemy_id' => '1',
            'skill_id' => '1'
        );

         $this->assertEquals($data['enemy_id'], $expected['enemy_id']);
         $this->assertEquals($data['skill_id'], $expected['skill_id']);
    } 
}
