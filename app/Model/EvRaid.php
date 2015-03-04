<?php
App::uses('AppModel', 'Model');
/**
 * EvRaid Model
 *
 */
class EvRaid extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ev_raid_id';

    /**
     * 稼働中のイベントを返す
     */
    public function isEvent() {
        $nowDate = $this->nowDate();

        $where = array(
            'start_time < ' => $nowDate
        ,   'end_time > '   => $nowDate
        );
        $order = array('start_time DESC');
        $row = $this->getAllFind($where , array(), 'first', $order);
        return $row;
    }

    /**
     * データ取得
     *
     * @author imanishi
     * @param int $evRaidId
     * @return array 対象データ
     */
    public function getData($id) {

        $where = array('ev_raid_id' => $id);
        $ret = $this->getAllFind($where, $fields = array(), 'first');
        return $ret;
    }

}
