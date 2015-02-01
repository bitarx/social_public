<?php
App::uses('AppModel', 'Model');
/**
 * UserCollect Model
 *
 * @property Card $Card
 */
class UserCollect extends AppModel {

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
		'new_flg' => array(
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
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    /**
     * まだ取得がない場合は登録する
     *
     * @author imanishi
     * @param int userId
     * @param int cardId
     * @return bool true:初めての取得なので登録した false:既に取得済み
     */
     public function initCollect($userId, $cardId) {

         // 存在確認
         $where = array(
             'user_id' => $userId
         ,   'card_id' => $cardId
         );
         $field = array('user_id');
         $ret = $this->getAllFind($where, $field, 'first');
         if (empty($ret)) {
             $field = array('user_id', 'card_id');
             $values = array();
             $values[] = array($userId, $cardId);
             $this->insertBulk($field, $values);

             return true;
         } else {
             // 既に取得済み
             return false;
         }
     }

     /**
      * ユーザーの取得種類数
      *
      * @param int userId
      * @return int 取得数
      */
     public function getCardCnt ($userId) {

         $where = array('user_id' => $userId);
         $field = array('card_id');
         $list = $this->getAllFind($where, $field);

         return count($list);
     }
}
