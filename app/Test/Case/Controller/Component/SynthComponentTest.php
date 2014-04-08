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

    /**
     * 進化合成消費ゴールド計算メソッド確認
     *
     * @author imanishi
     */
    public function testUseMoneyEvol(){

        // ベースカードデータ
        $data['Card'] = array(
            'card_id' => 1 
        ,   'rare_level' => 5 
        );
        // レア度×800
        $useMoneyEvol = $this->synthComponent->useMoneyEvol($data);

        $this->assertEquals($useMoneyEvol, 4000);

    }

    /**
     * 進化合成可能判定メソッド確認
     *
     * @author imanishi
     */
    public function testJudgeEvol(){

        // ベースカードデータ
        $baseCard['Card'] = array(
            'card_id' => 1 
        ,   'card_level' => 20
        );
        $baseCard['level'] = 10;

        // 素材カードデータ
        $targetCard = array(
            'card_id' => 1 
        ,   'level' => 1 
        );
        // 可能
        $bool = $this->synthComponent->judgeEvol($baseCard, $targetCard);

        $this->assertTrue($bool);


        // 素材が違うので不可 
        $targetCard = array(
            'card_id' => 5 
        ,   'level' => 1 
        );
        $bool = $this->synthComponent->judgeEvol($baseCard, $targetCard);

        $this->assertFalse($bool);


        // レベル不足で不可 
        $baseCard['level'] = 9;
        $targetCard = array(
            'card_id' => 1 
        ,   'level' => 1 
        );
        $bool = $this->synthComponent->judgeEvol($baseCard, $targetCard);

        $this->assertFalse($bool);

    }
}
