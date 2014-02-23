<?php
App::uses('AppModel', 'Model');
/**
 * EvStageProb Model
 *
 * @property EvStage $EvStage
 */
class EvStageProb extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_stage_prob_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ev_stage_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'kind' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'target' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'num' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prob' => array(
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
		'EvStage' => array(
			'className' => 'EvStage',
			'foreignKey' => 'ev_stage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * イベントステージアイテム抽選確率取得
     *
     * @author imanishi
     * @param int $evStageId
     * @return array 抽選確率リスト
     */
    public function getEvStageProb($evStageId) {
        $where = array('ev_stage_id' => $evStageId );
        $list = $this->getAllFind($where);
        return $list;
    }
}
