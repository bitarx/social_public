<?php
App::uses('AppModel', 'Model');
/**
 * TmpSendMe Model
 *
 */
class EvRaidRank1st extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';


   public function getList () {
       $field = array('ev_raid_rank','user_id','point');
       $list = $this->getAllFind($where = array(), $field);
       return $list;
   }

}
