<?php
App::uses('ComponentCollection', 'Controller');
App::uses('BattleComponent', 'Controller/Component');
 
class BattleComponentTest extends CakeTestCase {
 
    public function setUp(){
        parent::setUp();
 
        $Collection = new ComponentCollection();
        $this->battleComponent = new BattleComponent($Collection);
    }
 
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

}
