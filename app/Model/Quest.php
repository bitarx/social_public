<?php
App::uses('AppModel', 'Model');
/**
 * Quest Model
 *
 */
class Quest extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'quest_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'quest_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quest_detail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'detail_before1' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'detail_before2' => array(
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
	);


    /**
     * クエストデータ取得
     *
     * @author imanishi
     * @param int $questId
     * @return array 対象データ
     */
    public function getQuestData($questId) {

        $where = array('quest_id' => $questId);
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

        $where = array('quest_id <=' => $questId);
        $order = array('quest_id DESC');
        $ret = $this->getAllFind($where, $fields = array(), $kind = 'all', $order);
        return $ret;
    }
}
