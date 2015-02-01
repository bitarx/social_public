<?php
App::uses('AppModel', 'Model');
App::uses('Item', 'Model');
App::uses('Card', 'Model');
/**
 * RaidPresentLog Model
 *
 * @property User $User
 * @property RaidMaster $RaidMaster
 */
class RaidPresentLog extends AppModel {



    public function regist($values) {
        $fields = array('user_id', 'raid_master_id', 'kind', 'target', 'num');
        return $this->insertBulk($fields, $values);
    }

    /**
     * 履歴をレイドマスタIDより取得
     *
     * @param int raidMasterId
     * @param int userId
     * @return array 結果一覧
     */
    public function getListByRaidMasterId ($raidMasterId, $userId = 0) {
       
        if (!empty($userId)) $where['user_id'] = $userId;

        $where['raid_master_id'] = $raidMasterId;
        $list = $this->getAllFind($where);

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

        return $list;
    }
}
