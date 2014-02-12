<?php
App::uses('TutorialsController', 'Controller');

/**
 * TutorialsController Test Case
 *
 */
class TutorialsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tutorial',
		'app.sns_user',
		'app.user',
		'app.battle_log',
		'app.friend',
		'app.message',
		'app.rank_ev_battle',
		'app.rank_ev_raid',
		'app.user_card',
		'app.card',
		'app.skill',
		'app.enemy',
		'app.ev_stage',
		'app.ev_quest',
		'app.ev_stage_prob',
		'app.stage',
		'app.quest',
		'app.stage_prob',
		'app.raid',
		'app.user_raid',
		'app.user_raid_log',
		'app.card_group',
		'app.gacha_prob',
		'app.gacha',
		'app.user_gacha_day',
		'app.user_gacha_log',
		'app.user_collect',
		'app.user_cur_stage',
		'app.user_deck_card',
		'app.user_deck',
		'app.user_ev_stage',
		'app.user_login_all_log',
		'app.user_login_day',
		'app.user_login_log',
		'app.user_param',
		'app.user_present_box',
		'app.user_prof',
		'app.user_stage',
		'app.user_tutorial'
	);

    private function _setStab($tutorialId) {

        $record = array(
            'UserTutorial' => array(
                'tutorial_id' => $tutorialId,
                'end_flg' => 0
            )
        );

        $stab = $this->generate("Tutorials", array(
            'models' => array(
                'UserTutorial' => array('getAllFind')
            )
        ));
        $stab->UserTutorial->expects($this->any())
             ->method('getAllFind')
             ->will($this->returnValue($record));
    }

/**
 * testIndex method
 *
 * @return void
 */
	public function testTutorial_1() {
        $ret = $this->testAction('/tutorials/tutorial_1/');
        debug($ret);
	}

	public function testTutorial_2() {

        $this->_setStab(2);

        $ret = $this->testAction('/tutorials/tutorial_2/');
        debug($ret);
	}

	public function testTutorial_3() {

        $this->_setStab(3);

        $ret = $this->testAction('/tutorials/tutorial_3/');
        debug($ret);
	}

	public function testTutorial_4() {

        $this->_setStab(4);

        $ret = $this->testAction('/tutorials/tutorial_4/');
        debug($ret);
	}

	public function testTutorial_5() {

        $this->_setStab(5);

        $ret = $this->testAction('/tutorials/tutorial_5/');
        debug($ret);
	}

	public function testTutorial_6() {
        $this->_setStab(6);
        $ret = $this->testAction('/tutorials/tutorial_6/');
        debug($ret);
	}

	public function testTutorial_7() {
        $this->_setStab(7);
        $ret = $this->testAction('/tutorials/tutorial_7/');
        debug($ret);
	}

	public function testTutorial_8() {
        $this->_setStab(8);
        $ret = $this->testAction('/tutorials/tutorial_8/');
        debug($ret);
	}

	public function testTutorial_9() {
        $this->_setStab(9);
        $ret = $this->testAction('/tutorials/tutorial_9/');
        debug($ret);
	}

	public function testTutorial_10() {
        $this->_setStab(10);
        $ret = $this->testAction('/tutorials/tutorial_10/');
        debug($ret);
	}

	public function testTutorial_11() {
        $this->_setStab(11);
        $ret = $this->testAction('/tutorials/tutorial_11/');
        debug($ret);
	}

	public function testTutorial_12() {
        $this->_setStab(12);
        $ret = $this->testAction('/tutorials/tutorial_12/');
        debug($ret);
	}

	public function testTutorial_13() {
        $this->_setStab(13);
        $ret = $this->testAction('/tutorials/tutorial_13/');
        debug($ret);
	}

	public function testTutorial_14() {
        $this->_setStab(14);
        $ret = $this->testAction('/tutorials/tutorial_14/');
        debug($ret);
	}

/**
 * testFind method
 *
 * @return void
 */
	public function testFind() {
	}

/**
 * testInit method
 *
 * @return void
 */
	public function testInit() {
	}

}
