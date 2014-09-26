<?php
App::uses('AppModel', 'Model');
/**
 * UserStage Model
 *
 * @property Stage $Stage
 */
class UserStage extends AppModel {

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
		'stage_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'progress' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state' => array(
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
		'Stage' => array(
			'className' => 'Stage',
			'foreignKey' => 'stage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * ユーザ到達ステージ最大を取得
     *
     * @author imanishi 
     * @param int $userId
     * @return int 到達最大stageId
     */
    public function getUserMaxStageId($userId) {

        $ret = 0;
        $where  = array('user_id' => $userId); 
        $fields = array('MAX(UserStage.stage_id) AS stage_id');
        $data = $this->getAllFind($where, $fields, $kind = 'first');
        if (!empty($data['stage_id'])) { $ret = $data['stage_id']; } 
        return $ret;
    }

    /**
     * ユーザクエスト進捗を取得
     *
     * @author imanishi 
     * @param int $userId
     * @param int $stageId
     * @param int $recu 2でクエスト情報を含むステージ取得
     * @return array 対象データ
     */
    public function getUserStage($userId, $stageId = 0, $recu = 0) {

        $fields = array();
        $order  = array();
        $kind = 'all';
        $where = array('user_id' => $userId);
        if (!empty($stageId)) {
            $where['stage_id'] = $stageId;
            
            // 対象のステージのみ取得
            $kind = 'first';
        } else {
            $order = array('Stage.quest_id DESC', 'Stage.stage_id DESC');
        }

        $ret = $this->getAllFind($where, $fields, $kind, $order, 0, 0, $recu);
        return $ret;
    }

    public function getUserStageByEnemyId($userId, $enemyId, $state = 3 ) {

        $fields = array();
        $order  = array();
        $kind = 'first';
        $where = array( 'conditions' => array(
            'UserStage.user_id' => $userId
        ,   'UserStage.state' => $state
        ,   'Stage.enemy_id' => $enemyId
        ));
        $option = array(
            $where
        );

        $data = $this->find($kind, $option);
        return $data;
    }

    /**
     * ユーザクエスト進捗を更新
     *
     * @author imanishi 
     * @param int $data
     * @return array
     */
    public function initUserStage($data) {

        // 存在チェック
        $where = array(
            'user_id'  => $data['user_id']
        ,   'UserStage.stage_id' => $data['stage_id']
        );
        $exist = $this->field('user_id', $where);
        if (!$exist) {
            $values = array(
                'user_id'  => $data['user_id']
            ,   'stage_id' => $data['stage_id']
            ,   'progress' => $data['progress']
            ,   'state'    => $data['state']
            );

            // cakeは複合プライマリキーを見ないので登録される
            $ret = $this->save($values);
        } else {

            // レコードが存在する場合は更新
            $values = array(
                'progress' => $data['progress']
            ,   'state'    => $data['state']
            );
            $ret = $this->updateAll($values, $where);
        }
        return $ret;
    }

    /**
     * シーン鑑賞用のリスト
     *
     * @return array $list
     **/
    public function getUserStageForScene($where, $field, $limit, $offset, &$pageAll)
    {
        $order = array('UserStage.stage_id ASC');
        $list = $this->getAllFind($where, $field, 'all', $order, $limit, $offset);

        $field = array('stage_id');
        $all = $this->getAllFind($where, $field, 'all');
        $pageAll = ceil(count($all) / PAGE_LIMIT);
        if (empty($pageAll)) {
            $pageAll = 1;
        }

        return $list;
    }
}
