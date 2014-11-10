<?php
App::uses('AppModel', 'Model');
/**
 * UserGachaLog Model
 *
 * @property Gacha $Gacha
 * @property Card $Card
 */
class UserGachaLog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'gacha_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_flg' => array(
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
		'Gacha' => array(
			'className' => 'Gacha',
			'foreignKey' => 'gacha_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

   /**
     * がチャログデータ取得
     *
     * @author imanishi
     * @param int $id
     * @return array データ
     */
    public function getGachaLogData($id) { 

        $where = array('id' => $id);  
        $ret = $this->getAllFind($where, $fields = array(), 'first'); 
        return $ret;
    } 

   /**
     * がチャログデータ最新取得
     *
     * @author imanishi
     * @param int $userId
     * @param int $limit 最新から幾つ取得するか
     * @return array データ
     */
    public function getGachaLogDataLatest($userId, $limit = 1) { 

        $where = array('user_id' => $userId);  
        $order = array('UserGachaLog.created DESC');
        $list = $this->getAllFind($where, $fields = array(), 'all', $order, $limit); 
        return $list;
    } 
}
