<?php
App::uses('AppModel', 'Model');
/**
 * CardGroup Model
 *
 * @property Card $Card
 */
class CardGroup extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'card_group_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'evol_group' => array(
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
		'prev' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'next' => array(
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
     * 進化情報を取得する
     *
     * @author imanishi
     * @param int $cardId
     * @return array $data
     */
    public function getCardGroup ($cardId) {

        $where = array('card_id' => $cardId);
        $field = array();
        $data = $this->getAllFind($where, $field, 'first');
        return $data;
    }

    /**
     * 同じカードグループにあるか判定
     *
     * @author imanishi
     * @param int $baseCardId  
     * @param int $targetCardId 
     * @return true:進化可能 false:進化不可 
     */
    public function judgeSameCardGroup ($baseCardId, $targetCardId) {

        $baseData   = $this->getCardGroup($baseCardId);
        $targetData = $this->getCardGroup($targetCardId);

        if (!$baseData || !$targetData) return false;

        $ret = false;
        if ($baseData['evol_group'] == $targetData['evol_group']) { 
            $ret = true; 
        } 

        // 次へ進化できるか
        if ($ret) {
            $where = array(
                'CardGroup.card_id' => $baseData['card_id']
            );
            $next = $this->field('next', $where);
            if (empty($next)) {
                // これ以上進化できない
                $ret = 0;
            }
        }
        return $ret;
    }

    /**
     * 次の進化カードIDを取得
     *
     * @param int card_id
     * @return int 次の進化のカードID
     */
    public function getNext($cardId) {
        $where = array('card_id' => $cardId);
        $field = array('next');
        $row = $this->getAllFind($where, $field, 'first', array(), array(), array(), $recu = -1);

        return empty($row['next']) ? 0 : $row['next'];
    }
}
