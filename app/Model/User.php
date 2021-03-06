<?php
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property SnsUser $SnsUser
 */
class User extends AppModel {

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
		'user_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sns_user_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'carrer' => array(
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
		'SnsUser' => array(
			'className' => 'SnsUser',
			'foreignKey' => 'sns_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * SNS側データを反映させるか判定
 *
 * @param int userId
 * @return bool true:反映させる false:させない
 */
    public function isSnsDataUpdate($userId) {

        $target = date("Y-m-d H:i:s", time()-SNS_DATA_UPDATE_TARM);
        $where = array(
                    'user_id'     => $userId
                ,   'modified < ' => $target
                );
        $ret = $this->getAllFind($where);
        return empty($ret) ? false : true;
    }

    /**
     * userIdよりSNSIDを取得
     *
     * @param int userId
     * @return int sns_user_id
     */
    public function getOwnerIdByUserId ($userId) {
        $where = array(
            'user_id' => $userId
        );
        $snsUserId = $this->field('sns_user_id', $where);
        return $snsUserId;
    }

    /**
     * 名前を取得
     *
     * @author imanishi
     * @param int userId
     * @return str ユーザ名
     */
    public function getUserName($userId) {
        $where = array(
            'user_id' => $userId
        );
        $name = $this->field('user_name', $where);
        return $name;
    }

    /**
     * Message未送信ユーザー一覧取得
     *
     */
    public function getStillSendUserList ($limit, $notIn = array()) {

        $where = array();

        // NOT IN
        if (!empty($notIn)) {
            $where['NOT'] = $notIn;
        }

        $order = array();
        $offset = 0;
        $recursive = -1;

        $list = $this->getAllFind($where, $fields = array('*'), $kind = 'all', $order, $limit, $offset, $recursive );

        return $list;
    }
}
