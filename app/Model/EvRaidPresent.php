<?php
App::uses('AppModel', 'Model');
App::uses('Card', 'Model');
App::uses('Item', 'Model');
/**
 * EvRaidPresent Model
 *
 * @property EvQuest $EvQuest
 */
class EvRaidPresent extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_raid_present_id';



    /**
     * イベント報酬一覧取得
     *
     * @author imanishi 
     * @param int レイドイベントID 
     * @return array $list 報酬一覧
     */
    public function getList($evRaidId) { 
         
        $where = array('ev_raid_id' => $evRaidId );
        $field = array('ev_raid_present_id', 'kind', 'target', 'num');
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
