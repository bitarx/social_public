<?php
App::uses('ComponentCollection', 'Controller');
App::uses('CommonComponent', 'Controller/Component');
 
class CommonComponentTest extends CakeTestCase {
 
    public function setUp(){
        parent::setUp();
 
        $Collection = new ComponentCollection();
        $this->commonComponent = new CommonComponent($Collection);
    }
 
    public function testDoLot(){

        $list = array(
            array(
                'kind' => 1
            ,   'target' => 28
            ,   'num' => 1
            ,   'prob' => 5
            ),
            array(
                'kind' => 2
            ,   'target' => 20
            ,   'num' => 1
            ,   'prob' => 15
            )
        );
        $data = $this->commonComponent->doLot($list);

        $this->assertNotEmpty($data['kind']);
    }


    /**
     * 現在は当日であるかを判定メソッドを確認
     *
     * @author imanishi
     */
    public function testIsToday() {
        
        $modified = date("Y-m-d H:i:s");
        $ret = $this->commonComponent->isToday($modified);
        $this->assertTrue($ret);

        $timeSp = time() - 3700;
        $modified = date("Y-m-d H:i:s", $timeSp);
        $ret = $this->commonComponent->isToday($modified);
        $this->assertFalse($ret);
    }
}
