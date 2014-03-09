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

        // 味方の防御アップ
        $skillData = array(
            'effect' => 1 
        ,   'updown' => 1
        ,   'target' => 3
        ,   'percent' => 10 
        );
        
        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);
        $this->assertEquals($selfCards[0]['def'], 110);
        $this->assertEquals($selfCards[1]['def'], 110);
        $this->assertEquals($selfCards[2]['def'], 110);
        $this->assertEquals($selfCards[3]['def'], 110);
        $this->assertEquals($selfCards[4]['def'], 110);


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

        // 相手の防御ダウン
        $skillData = array(
            'effect' => 1 
        ,   'updown' => 2
        ,   'target' => 2
        ,   'percent' => 10 
        );
        
        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);
        $tKey = $targetCards['t_key'];
        $this->assertEquals($targetCards[$tKey]['def'], 90);


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

        // 相手全体の防御ダウン
        $skillData = array(
            'effect' => 1 
        ,   'updown' => 2
        ,   'target' => 4
        ,   'percent' => 10 
        );
        
        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);
        $this->assertEquals($targetCards[0]['def'], 90);
        $this->assertEquals($targetCards[1]['def'], 90);
        $this->assertEquals($targetCards[2]['def'], 90);
        $this->assertEquals($targetCards[3]['def'], 90);
        $this->assertEquals($targetCards[4]['def'], 90);


        // 自分の攻撃アップ
        $skillData = array(
            'effect' => 2 
        ,   'updown' => 1
        ,   'target' => 1
        ,   'percent' => 10 
        );

        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);

        $this->assertEquals($selfCards[$key]['atk'], 110);


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

        // 相手の攻撃ダウン
        $skillData = array(
            'effect' => 2 
        ,   'updown' => 2
        ,   'target' => 2
        ,   'percent' => 10 
        );

        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);

        $tKey = $targetCards['t_key'];
        $this->assertEquals($targetCards[$tKey]['atk'], 90);


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

        // 味方の攻撃アップ
        $skillData = array(
            'effect' => 2 
        ,   'updown' => 1
        ,   'target' => 3
        ,   'percent' => 10 
        );

        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);

        $this->assertEquals($selfCards[0]['atk'], 110);
        $this->assertEquals($selfCards[1]['atk'], 110);
        $this->assertEquals($selfCards[2]['atk'], 110);
        $this->assertEquals($selfCards[3]['atk'], 110);
        $this->assertEquals($selfCards[4]['atk'], 110);



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

        // 相手全体の攻撃ダウン
        $skillData = array(
            'effect' => 2 
        ,   'updown' => 2
        ,   'target' => 4
        ,   'percent' => 10 
        );

        $this->battleComponent->doSkill($skillData, $key, $selfCards, $targetCards);

        $this->assertEquals($targetCards[0]['atk'], 90);
        $this->assertEquals($targetCards[1]['atk'], 90);
        $this->assertEquals($targetCards[2]['atk'], 90);
        $this->assertEquals($targetCards[3]['atk'], 90);
        $this->assertEquals($targetCards[4]['atk'], 90);
    }
}
