<?php
App::uses('AppModel', 'Model');
/**
 * RaidUserCurStage Model
 *
 * @property RaidStage $RaidStage
 */
class RaidUserCurStage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'raid_stage_id' => array(
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
		'RaidStage' => array(
			'className' => 'RaidStage',
			'foreignKey' => 'raid_stage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * 現在のステージIDを取得
     *
     * @param int $userId
     * @return int $raidStageId
     */
    public function getCurStageId ($userId) {
        $where = array(
            'user_id' => $userId
        );
        $raidStageId = $this->field('raid_stage_id', $where);

        return $raidStageId;
    }
}
