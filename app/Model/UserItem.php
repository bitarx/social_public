<?php
App::uses('AppModel', 'Model');
App::uses('Item', 'Model');
/**
 * UserItem Model
 *
 * @property User $User
 * @property Item $Item
 * @property UserBox $UserBox
 */
class UserItem extends AppModel {

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
		'item_id' => array(
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
		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UserBox' => array(
			'className' => 'UserBox',
			'foreignKey' => 'user_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    /**
     * 取得アイテムを登録
     *
     * @author imanishi 
     * @param int $userId
     * @param int $itemId
     * @param int $num
     * @return bool 
     */
    public function registItem($userId, $itemId, $num) {

        $where = array(
            'user_id' => $userId
        ,   'item_id' => $itemId
        );
        $fields = array('id', 'item_id', 'num'); 
        $data = $this->getAllFind($where, $fields, 'first');

        $data['num'] += $num;

        $ret = $this->save($data);
        return $ret;
    }

    /**
     * プレミアムガチャチケット所有確認
     *
     * @author imanishi 
     * @param int $userId
     * @return int 枚数
     */
    public function hasPremiumGachaTiket($userId) {

        $where = array(
            'user_id' => $userId
        ,   'item_id' => PGACHA_ITEM_ID
        ,   'num > '  => 0
        );
        $fields = array('num'); 
        $ret = $this->getAllFind($where, $fields, 'first');

        $tNum = !empty($ret['num']) ? $ret['num'] : 0;

        return $tNum;
    }
}
