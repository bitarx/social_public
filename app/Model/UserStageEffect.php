<?php
App::uses('AppModel', 'Model');
/**
 * UserStageEffect Model
 *
 * @property User $User
 */
class UserStageEffect extends AppModel {

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
		'effect' => array(
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
		)
	);

/**
 * クエストアイテム効果による確率変動
 *
 * @param int $userId
 * @param array $list 確率のリスト
 * @return array [0] 0:確率変動なし 1:効果Id(3:カード 4:ゴールド)
 *               [1] アイテム効果残り秒
 */
    public function changeProbList($userId, &$list = array()) {

        // 有効時間
        $targetTs = time() - (60 * ITEM_EFFECT_MINUTES); 
        $targetTime = date("Y-m-d H:i:s", $targetTs);

        // 効果 
        $where = array(
                     'UserStageEffect.created > ' => $targetTime 
                 );
        $field = array('effect', 'created');
        $data = $this->getAllFind($where, $field, 'first');

        $effectSecond = 0;

        if (!empty($data['created'])) {
            $ts = strtotime($data['created']);

            $sabun = time() - $ts;

            // 残り時間【秒】
            $effectSecond = (60 * ITEM_EFFECT_MINUTES) - $sabun;
        }

        $effect = 0;

        // 効果アイテムがある
        if (!empty($data['effect']) ) {
         
            $effect = $data['effect'];

            switch ($data['effect']) {
                // カード
                case 3:
                    $kind = KIND_CARD;
                    break;
                // ゴールド
                case 4:
                    $kind = KIND_GOLD;
                    break;
            }

            // 確率変動
            $afterProb = 0;
            if (!empty($list)) {
                foreach ($list as $key => &$val) {
                    if($kind == $val['kind']) {
                        $targetKey = $key;
                    }
                    $afterProb += $val['prob'];
                }
                $list[$targetKey]['prob'] = $afterProb * 2;
            }
        }

        return array($effect, $effectSecond);
    }
}
