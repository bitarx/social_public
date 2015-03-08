<?php
App::uses('AppModel', 'Model');
/**
 * EvRaidRankFirst Model
 *
 */
class EvRaidRankFirst extends AppModel {

    public function getList($limit) {

        $field = array('EvRaidRankFirst.rank', 'EvRaidRankFirst.user_id', 'EvRaidRankFirst.point',  'User.user_name', 'UserCard.card_id');
        $where = array();
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
}
