<?php
App::uses('ApiController', 'Controller');
/**
 * Collect Controller
 *
 * @since 2014/12/04
 * @author imanishi
 */
class UserCollectsController extends ApiController {

    protected static $title = '図鑑';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Common');

    public $uses = array('UserCard', 'UserBaseCard', 'Card', 'UserDeckCard', 'UserParam', 'UserCollect');

    /**
     * カード一覧
     *
     * @author imanishi 
     * @return json
     */
	public function index() {


        // 入手済みカード
        $pageAll = 0;
        $order = array('Card.card_id ASC');
        $list = $this->Card->getCardListWithCollect($this->userId, $order, $this->offset, $pageAll); 
        foreach ($list as &$val) {
            if (!empty($val['created'])) {
                $val['created'] = str_replace('-', '/', $val['created']);
                $val['disp'] = 1;
            } else {
                $val['created'] = null;
                $val['disp'] = 0;
            }
        }

        $this->set('list', $list);
        $this->set('key', 99);
        $this->set('pageAll', $pageAll);
        $this->set('title', self::$title);
	}

}
