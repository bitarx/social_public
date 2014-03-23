<?php
App::uses('AppModel', 'Model');
/**
 * Stage Model
 *
 * @property Quest $Quest
 * @property Enemy $Enemy
 */
class Stage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'stage_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'quest_id' => array(
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
		'Quest' => array(
			'className' => 'Quest',
			'foreignKey' => 'quest_id',
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
        $where = array('quest_id' => $questId);
        $order = array('stage_id ASC');

        $data = $this->getAllFind($where, $fields, $kind, $order, $limit = 1);
        return $data;
    }
}
