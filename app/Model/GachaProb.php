<?php
App::uses('AppModel', 'Model');
/**
 * GachaProb Model
 *
 * @property Gacha $Gacha
 * @property Card $Card
 */
class GachaProb extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'gacha_prob_id';

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
		'prob' => array(
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
     * ガチャ確率リスト取得
     *
     * @author imanishi
     * @param int $gachaId
     * @param array $list ガチャ確率リスト
     * @return array $list
     */
    public function getGachaProbList ($gachaId) {

        $where = array('gacha_id' => $gachaId);
        $list = $this->getAllFind($where);
        return $list;
    }
}
