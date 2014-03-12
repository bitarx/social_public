<?php
App::uses('ComponentCollection', 'Controller');
App::uses('SynthComponent', 'Controller/Component');

App::import('Model', 'CardGroup');
 
class SynthComponentTest extends CakeTestCase {

    var $fixtures = array(
       'card_group'
    ,  'card'
    );
 
    public function setUp(){
        parent::setUp();
 
        $Collection = new ComponentCollection();
        $this->synthComponent = new SynthComponent($Collection);
    }
 

    /**
     * 進化合成実行メソッドを確認
     *
     * @author imanishi
     */
    public function testDoSynthEvol(){

        // 正常に進化
        $baseId = 1;
        $targetId = 1;
        $afterId = $this->synthComponent->doSynthEvol($baseId, $targetId);

        $this->assertEquals($afterId, 2);

        // 異常系
        $targetId = 2;
        $afterId = $this->synthComponent->doSynthEvol($baseId, $targetId);

        $this->assertEquals($afterId, 0);
    }

    /**
     * 強化合成実行メソッドを確認
     *
     * @author imanishi
     */
    public function testDoSynthUp(){

        $userBaseCard = array(
            'user_card_id' => 1
        ,   'card_id' => 1
        ,   'hp'      => 100
        ,   'hp_max'  => 100
        ,   'atk'     => 100
        ,   'def'     => 100
        );
        $targetList = array(
            array(
                'user_card_id' => 2
            ,   'card_id' => 2
            ,   'hp'      => 100
            ,   'hp_max'  => 100
            ,   'atk'     => 100
            ,   'def'     => 100
            ),
            array(
                'user_card_id' => 3
            ,   'card_id' => 3
            ,   'hp'      => 50
            ,   'hp_max'  => 50
            ,   'atk'     => 50
            ,   'def'     => 50
            ),
        );
        $cardData = $this->synthComponent->doSynthUp($userBaseCard, $targetList);
        $expected = array(
            'user_card_id' => 1
        ,   'card_id' => 1
        ,   'hp'      => 115
        ,   'hp_max'  => 115
        ,   'atk'     => 115
        ,   'def'     => 115
        );
        $this->assertEquals($cardData, $expected);
    }
}
