<?php
App::uses('AppModel', 'Model');
/**
 * BattleLog Model
 *
 * @property User $User
 */
class BattleLog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'target_user' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'result' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'log' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * バトルログリスト取得
     *
     * @author imanishi
     * @param int $userId
     * @return array ログリスト
     */
    public function getBattleLogList($userId, $limit = 2, $offset = 0) {

        $where = array(
            'OR' => array(
                'user_id' => $userId
            ,   'target_user' => $userId
            ) 
        );
        $fields = array('id', 'target_user', 'result', 'log');
        $order = array('BattleLog.created DESC');
        $ret = $this->getAllFind($where, $fields, 'all', $order, $limit, $offset);
        return $ret;
    }

    /**
     * 最新バトルログデータ取得
     *
     * @author imanishi
     * @param int $userId
     * @return array 最新ログデータ
     */
    public function getBattleLogDataLatest($userId) {

        $where = array('user_id' => $userId);
        $fields = array('id', 'target_user', 'result', 'log');
        $order = array($this->getTableAlias() . '.created DESC'); 
        $ret = $this->getAllFind($where, $fields, 'first', $order);
        return $ret;
    }

    /**
     * バトルログデータ取得
     *
     * @author imanishi
     * @param int $id
     * @return array ログデータ
     */
    public function getBattleLogData($id) {

        $where = array('id' => $id);
        $fields = array('id', 'target_user', 'result', 'log');
        $ret = $this->getAllFind($where, $fields, 'first');
        return $ret;
    }

    /**
     * バトルログデータ登録更新
     *
     * @author imanishi
     * @param array $values
     * @return array ログデータ
     */
    public function initBattleLogData($values) {

        $ret = $this->save($values);
        return $ret;
    }
}
