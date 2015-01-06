<?php
App::uses('AppModel', 'Model');
App::uses('Card', 'Model');
App::uses('Item', 'Model');
/**
 * FriendInvitePresent Model
 *
 */
class FriendInvitePresent extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'friend_invite_present_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'point' => array(
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
     * 招待報酬一覧取得
     *
     * @author imanishi 
     * @param int ポイントID 
     * @return array $list 報酬一覧
     */
    public function getList($point) { 
         
        $where = array('point' => $point );
        $field = array('friend_invite_present_id', 'kind', 'target', 'num');
        $list  = $this->getAllFind($where, $field, 'all');

        if (!empty($list)) {
            foreach ($list as &$val) {
                if (KIND_CARD == $val['kind']) {
                    $card = new Card();
                    $tmp = $card->getCardData($val['target']);
                    $val['name'] = $tmp['card_name'];

                } elseif (KIND_ITEM == $val['kind']) {
                    $item = new Item();
                    $tmp = $item->getData($val['target']);
                    $val['name'] = $tmp['item_name'];

                } elseif (KIND_GOLD == $val['kind']) {
                    $val['name'] = $val['num'] . MONEY_NAME;

                }
            }
        }
        return $list;
    } 
}
