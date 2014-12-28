<?php
App::uses('AppModel', 'Model');
/**
 * Stage Model
 *
 * @property Quest $Quest
 * @property Enemy $Enemy
 */
class EvStage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_stage_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ev_quest_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'stage_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'use_act' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prob_get' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enemy_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EvQuest' => array(
			'className' => 'EvQuest',
			'foreignKey' => 'ev_quest_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Enemy' => array(
			'className' => 'Enemy',
			'foreignKey' => 'enemy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * クエストの最初のステージを取得
     *
     * @author imanishi 
     * @param int $questId
     * @return array 対象のステージデータ
     */
    public function getFirstStage($questId) {

        $fields = array();
        $order  = array();
        $kind = 'first';
        $where = array('ev_quest_id' => $questId);
        $order = array('ev_stage_id ASC');

        $data = $this->getAllFind($where, $fields, $kind, $order, $limit = 1);
        return $data;
    }

    /**
     * クエストのステージIDを取得
     *
     * @author imanishi 
     * @param int $questId
     * @return array 対象のステージデータ
     */
    public function getQuestStageId($questId) {

        $fields = array('ev_stage_id');
        $order  = array();
        $kind = 'all';
        $where = array('ev_quest_id' => $questId);
        $order = array('ev_stage_id ASC');

        $data = $this->getAllFind($where, $fields, $kind, $order);
        return $data;
    }

    /**
     * クエストの最後のステージIDを取得
     *
     * @author imanishi 
     * @param int $questId
     * @return int 対象のステージID
     */
    public function getLastStageId($questId) {

        $fields = array('ev_stage_id');
        $order  = array();
        $kind = 'first';
        $where = array('ev_quest_id' => $questId);
        $order = array('ev_stage_id DESC');

        $data = $this->getAllFind($where, $fields, $kind, $order, $limit = 1);
        if (empty($data['ev_stage_id'])) return false;
        return $data['ev_stage_id'];
    }

    /**
     * 敵IDよりステージIDを取得
     *
     * @author imanishi 
     * @param int $questId
     * @return int 対象のステージID
     */
    public function getStageIdByEnemyId($enemyId) {

        $where = array('EvStage.enemy_id' => $enemyId);

        $evStageId = $this->field('ev_stage_id', $where);
        if (empty($evStageId)) return false;
        return $evStageId;
    }
}
