<?php
App::uses('AppModel', 'Model');
App::uses('UserLastActTime', 'Model');
/**
 * UserParam Model
 *
 */
class UserParam extends AppModel {

    // 行動力回復間隔（分）
    const ACT_RECOVER_INTERVAL = 3;

    // 行動力回復数
    const ACT_RECOVER_NUM = 1;

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
		'money' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'act' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'act_max' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cost_atc' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cost_def' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'exp' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'win' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lose' => array(
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

    /**
     * ユーザステータスを取得
     *
     * @author imanishi 
     * @param int $userId
     * @return array 対象データ
     */
    public function getUserParams($userId) { 
        $where = array('user_id' => $userId); 
        $ret = $this->getAllFind($where, array(), 'first'); 
        return $ret;
    } 

    /**
     * ユーザステータスを更新
     *
     * @param int $userId
     * @param array $data 更新データ
     * @return array 更新デー
     */
    public function setUserParams($userId, $data) { 

        $values = array('user_id' => $userId); 
        foreach ($data as $key => $val) {
            $values[$key] = $val;
        }
        $values['modified'] = NOW_DATE;

        return $this->save($values);
    } 

    /**
     * 対戦一覧を取得
     *
     * @author imanishi 
     * @param int $userId
     * @return array 対象データ
     */
    public function getBattleList($userId) { 
        $userParams = $this->getUserParams($userId);
        $level = $userParams['level'];
        $minus = $level - 1;
        $plus  = $level + 1;
        $where = array(
            'level' => array($minus, $level, $plus),
            'AND' => array(
                'NOT' => array('user_id' => array($userId) ) 
            )
        ); 
        $ret = $this->getAllFind($where, array(), 'all'); 
        return $ret;
    } 

    /**
     * 行動力自動回復
     *
     * @author imanishi 
     * @param array $userParam ユーザーステータス
     * @return array $userParam 回復後のステータス
     */
    public function recoverAct($userParam) {

        // 回復の余地があれば処理
        if (isset($userParam['act']) && $userParam['act'] < 100) {
            // 最後に行動した時間
            $userLastActTime = new UserLastActTime();
            $where = array('user_id' => $userParam['user_id']);
            $lastActTime = $userLastActTime->field('modified', $where);
            $lastActTimeSp = strtotime($lastActTime);
            $timeSp = time();

            // 経過時間(秒)
            $passTimeSp = $timeSp - $lastActTimeSp;

            // 必要経過時間(秒)
            $needTimeSp = self::ACT_RECOVER_INTERVAL * 60;

            // 回復に必要な時間が経過していれば回復
            if ($needTimeSp < $passTimeSp) {

                $num = floor($passTimeSp / $needTimeSp);
                $recoverAct = self::ACT_RECOVER_NUM * $num;

                $userParam['act'] += $recoverAct;
                if (100 < $userParam['act']) $userParam['act'] = 100;

                // ステータス更新
                $value = array(
                    'act' => $userParam['act'] 
                );
                $where = array('user_id' => $userParam['user_id']); 
                $this->updateAll($value, $where);
            }
        }

        return $userParam;
    }
}
