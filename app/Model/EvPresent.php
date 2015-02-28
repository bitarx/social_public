<?php
App::uses('AppModel', 'Model');
App::uses('Card', 'Model');
App::uses('Item', 'Model');
/**
 * EvPresent Model
 *
 * @property EvQuest $EvQuest
 */
class EvPresent extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_present_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ev_quest_id' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EvQuest' => array(
			'className' => 'EvQuest',
			'foreignKey' => 'ev_quest_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * イベント報酬一覧取得
     *
     * @author imanishi 
     * @param int イベントクエストID 
     * @return array $list 報酬一覧
     */
    public function getList($evQuestId) { 
         
        $where = array('ev_quest_id' => $evQuestId );
        $field = array('ev_present_id', 'kind', 'target', 'num');
        $list  = $this->getAllFind($where, $field, 'all');

        if (!empty($list)) {
            foreach ($list as &$val) {
                if (KIND_CARD == $val['kind']) {
                    $card = new Card();
                    $tmp = $card->getCardData($val['target']);
                    $val['name'] = $tmp['card_name'];
                    $val['title'] = $tmp['card_title'];

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
