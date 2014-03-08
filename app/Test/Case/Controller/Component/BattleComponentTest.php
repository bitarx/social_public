<?php
App::uses('ComponentCollection', 'Controller');
App::uses('BattleComponent', 'Controller/Component');
 
class BattleComponentTest extends CakeTestCase {
 
    public function setUp(){
        parent::setUp();
 
        $Collection = new ComponentCollection();
        $this->battleComponent = new BattleComponent($Collection);
    }
 

    /**
     * バトル実行メソッドを確認
     *
     * @author imanishi
     */
    public function testDoBattle(){

        $selfCards[0]['UserCard'] = array(
                'user_card_id' => 1
            ,   'card_id' => 28
            ,   'hp' => 1
            ,   'atk' => 50
            ,   'def' => 5
        );
        $targetCards[0]['UserCard'] = array(
                'user_card_id' => 2
            ,   'card_id' => 28
            ,   'hp' => 1
            ,   'atk' => 5
            ,   'def' => 5
        );
        $targetCards = $this->battleComponent->doBattle($selfCards, $targetCards);
        $this->assertEmpty($targetCards);
    }

    /**
     * ダメージ算出メソッドを確認
     *
     * @author imanishi
     */
    public function testCalcDamage(){

        $selfCards = array(
                'user_card_id' => 1
            ,   'card_id' => 28
            ,   'hp' => 1
            ,   'atk' => 50
            ,   'def' => 5
        );
        $targetCards = array(
                'user_card_id' => 2
            ,   'card_id' => 28
            ,   'hp' => 1
            ,   'atk' => 5
            ,   'def' => 5
        );
        $damage = $this->battleComponent->calcDamage($selfCards, $targetCards);
        $this->assertNotEmpty($damage);
    }

    /**
     * スキル実行メソッドを確認
     *
     * @author imanishi
     */
    public function testDoSkill(){

        $selfCards = array(
            array(
                'user_card_id' => 1
            ,   'card_id' => 20
            ,   'hp' => 1
            ,   'atk' => 100
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 2
            ,   'card_id' => 21
            ,   'hp' => 1
            ,   'atk' => 100
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 3
            ,   'card_id' => 22
            ,   'hp' => 1
            ,   'atk' => 100
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 4
            ,   'card_id' => 23
            ,   'hp' => 1
            ,   'atk' => 100
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 5
            ,   'card_id' => 24
            ,   'hp' => 1
            ,   'atk' => 100
            ,   'def' => 100 
            ),
        );
        $targetCards = array(
            array(
                'user_card_id' => 10
            ,   'card_id' => 10
            ,   'hp' => 1
            ,   'atk' => 100 
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 11
            ,   'card_id' => 11
            ,   'hp' => 1
            ,   'atk' => 100 
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 12
            ,   'card_id' => 12
            ,   'hp' => 1
            ,   'atk' => 100 
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 13
            ,   'card_id' => 13
            ,   'hp' => 1
            ,   'atk' => 100 
            ,   'def' => 100 
            ),
            array(
                'user_card_id' => 14
            ,   'card_id' => 14
            ,   'hp' => 1
            ,   'atk' => 100 
            ,   'def' => 100 
            ),
        );

        $key = 0;

        // 自分の防御アップ
        $skillData = array(
            'effect' => 1 
        ,   'updown' => 1
        ,   'target' => 1
        ,   'percent' => 10 
        );
        
        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);
        $this->assertEquals($selfCards[$key]['def'], 110);



        // 自分の攻撃アップ
        $skillData = array(
            'effect' => 2 
        ,   'updown' => 1
        ,   'target' => 1
        ,   'percent' => 10 
        );

        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);

        $this->assertEquals($selfCards[$key]['atk'], 110);
    }
}
