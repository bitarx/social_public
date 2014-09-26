<?php
App::uses('AppModel', 'Model');
App::uses('UserCard', 'Model');
App::uses('UserItem', 'Model');
App::uses('UserParam', 'Model');
App::uses('Card', 'Model');
App::uses('Item', 'Model');
/**
 * UserPresentBox Model
 *
 */
class UserPresentBox extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_present_boxs';

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
		'message' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
     * プレゼントデータ取得
     *
     * @author imanishi 
     * @param int  $userId
     * @param int  $userPresentBoxId 
     * @return array $data 
     */
    public function getDataById($userId, $userPresentBoxId ) { 
         
        $where = array(
            'user_id' => $userId 
        ,   'user_present_box_id' => $userPresentBoxId     
        );
        $field = array('user_present_box_id', 'kind', 'target', 'num', 'message', 'created');
        $data  = $this->getAllFind($where, $field, 'first');
        return $data;
    }

    /**
     * プレゼント未受け取り一覧取得
     *
     * @author imanishi 
     * @param int  $userId
     * @param int  $add 1:詳細情報取得追加
     * @param int  $offset オフセット
     * @param int  $pageAll 1:詳細情報取得追加
     * @return array $list 未受け取り一覧
     */
    public function getList($userId, $add = 0, $offset, &$pageAll = 'no') { 
         
        $where = array('user_id' => $userId );
        $field = array('user_present_box_id', 'kind', 'target', 'num', 'message', 'created');
        $order = array('created DESC');
        $limit = PAGE_LIMIT;
        $list  = $this->getAllFind($where, $field, 'all', $order, $limit, $offset);

        if (!empty($list) && $add == 1) {
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
                $timesp = strtotime($val['created']);
                $val['created'] = date("Y/m/d G時", $timesp);
            }
        }

        // ページ数カウント
        if ('no' !== $pageAll) {
            $where = array('user_id' => $userId );
            $field = array('user_present_box_id');
            $cntlist  = $this->getAllFind($where, $field, 'all');
            $cnt = count($cntlist) / PAGE_LIMIT;
            $pageAll = ceil($cnt);
            if (empty($pageAll)) $pageAll = 1;
        }
        return $list;
    } 

    /**
     * プレゼント受取
     *
     * @author imanishi 
     * @param int    $userId
     * @param array  $data 
     * @param array  $userParam   ユーザステータス    
     * @return int 受け取り後登録テーブルのID
     */
    public function getPresent($userId, $data, $userParam = array()) { 

        $id = 0;
        switch ($data['kind']) {
            // カード
            case KIND_CARD:
               $userCard = new UserCard();
               $id = $userCard->registCard($userId, $data['target'], $data['num'], $dam);
               break;

            // アイテム
            case KIND_ITEM:
               $userItem = new UserItem();
               $id = $userItem->registItem($userId, $data['target'], $data['num']);
               break;

            // お金
            case KIND_GOLD:
               $userParam['money'] += $data['num']; 
               $userP = new UserParam();
               $id = $userP->setUserParams($userId, $userParam);
               break;
        }

        // プレゼント論理削除
        $value[$this->_filDelFlg] = 1;
        $value['modified'] = NOW_DATE_DB;
        $where = array('user_present_box_id' => $data['user_present_box_id']);
  
        $this->updateAll($value, $where);
         
        return $id;
    } 
}

