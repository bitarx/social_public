<?php
App::uses('AppModel', 'Model');
/**
 * EvRaidRankFirst Model
 *
 */
class EvRaidRankFirst extends AppModel {

    public function getList($limit, $where = array()) {

        $field = array('EvRaidRankFirst.rank', 'EvRaidRankFirst.user_id', 'EvRaidRankFirst.point',  'User.user_name', 'UserCard.card_id');
        $order = array('id ASC');

        $joins = array(
            array('table' => 'users',
                'alias' => 'User',
                'type' => 'inner',
                'conditions' => array(
                    'EvRaidRankFirst.user_id = User.user_id',
                ),
            ),
            array('table' => 'user_base_cards',
                'alias' => 'UserBaseCard',
                'type' => 'inner',
                'conditions' => array(
                    'User.user_id = UserBaseCard.user_id',
                ),
            ),
            array('table' => 'user_cards',
                'alias' => 'UserCard',
                'type' => 'inner',
                'conditions' => array(
                    'UserBaseCard.user_card_id = UserCard.user_card_id',
                ),
            ),
        );

        $list = $this->getAllFind($where, $field, 'all', $order, $limit, 0, $recu = -1, $joins);

        return $list;
    }

    public function getCurRank($userId) {
        $where = array(
            'user_id' => $userId 
        );
        $rank = $this->field('rank', $where);

        return $rank;
    }

    public function getMaxRank() {
        $where = array();
        $field = array('MAX(rank) as maxrank');
        $row = $this->getAllFind($where, $field, 'first');
        $maxrank = !empty($row['maxrank']) ? $row['maxrank'] : 0;

        return $maxrank;
    }

    public function getSelfRankList($userId) {

        $list = array();
        $field = array();
        $limit = 1;

        // 自分
        $where = array(
            'user_id' => $userId
        );
        $rowSelf = $this->getList($limit, $where);

        if (empty($rowSelf)) {
            return $list;
        }

        // 一つ上位
        $upRank = $rowSelf[0]['rank'] - 1;
        $where = array(
            'rank' => $upRank
        );
        $rowUp = $this->getList($limit, $where);
        if (empty($rowUp)) {
            $upRank = $rowSelf[0]['rank'] - 2;
            $where = array(
                'rank' => $upRank
            );
            $rowUp = $this->getList($limit, $where);
        }

        // 一つ下位
        $downRank = $rowSelf[0]['rank'] + 1;
        $where = array(
            'rank' => $downRank
        );
        $rowDown = $this->getList($limit, $where);
        if (empty($rowDown)) {
            $downRank = $rowSelf[0]['rank'] + 2;
            $where = array(
                'rank' => $downRank
            );
            $rowDown = $this->getList($limit, $where);
        }

        if (!empty($rowUp)) {
            $rowUp[0]['rankStr'] = '一つ上';
            $list[] = $rowUp[0];
        }

        $rowSelf[0]['rankStr'] = 'あなた';
        $list[] = $rowSelf[0];

        if (!empty($rowDown)) {
            $rowDown[0]['rankStr'] = '一つ下';
            $list[] = $rowDown[0];
        }

        return $list;
    }
}
