<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class Info extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'news_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'news_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'news_detail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
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

    public function getList($limit = PAGE_LIMIT, $where = array(), $offset = 0, &$pageAll = 1) {

        $order = array('Info.start_time DESC');
        $fields = array();
        $list = $this->getAllFind($where, $fields, 'all', $order);

        $num = count($list);

        $pageAll = ceil($num / $limit);

        $list = $this->getAllFind($where, $fields, 'all', $order, $limit, $offset);

        foreach ($list as &$val) {
            $timesp = strtotime($val['start_time']);
            $val['start_time'] = date("Y/m/d G時", $timesp);
        }
        return $list;
    }
}
