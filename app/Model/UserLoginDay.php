<?php
App::uses('AppModel', 'Model');
/**
 * UserLoginDay Model
 *
 */
class UserLoginDay extends AppModel {

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
     * ログインデイズデータ取得
     *
     * @author imanishi
     * @param int $userId
     * @return string 更新日
     */
    public function getLoginDaysMod($userId) {

        $where = array('user_id' => $userId);
        $fields = array('modified');
        $ret = $this->getAllFind($where, $fields, 'first');
        return $ret;
    }
}
