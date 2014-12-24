<?php
App::uses('AppModel', 'Model');
/**
 * EvQuest Model
 *
 */
class EvQuest extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_quest_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ev_quest_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ev_quest_detail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prologue' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'epilogue' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'detail_after' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delete_flg' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    /**
     * 稼働中のイベントを返す
     */
    public function isEvent () {
        $nowDate = $this->nowDate();

        $where = array(
            'start_time < ' => $nowDate
        ,   'end_time > '   => $nowDate
        );
        $order = array('start_time DESC');
        $row = $this->getAllFind($where , array(), 'first', $order);
        return $row;
    }

    /**
     * クエストデータ取得
     *
     * @author imanishi
     * @param int $questId
     * @return array 対象データ
     */
    public function getQuestData($questId) {

        $where = array('ev_quest_id' => $questId);
        $ret = $this->getAllFind($where, $fields = array(), 'first');
        return $ret;
    }

    /**
     * 進行可能クエストリスト取得
     *
     * @author imanishi
     * @param int $questId
     * @return array 対象リスト
     */
    public function getQuestList($questId) {

        $where = array('ev_quest_id <=' => $questId);
        $order = array('ev_quest_id DESC');
        $ret = $this->getAllFind($where, $fields = array(), $kind = 'all', $order);
        return $ret;
    }
}
