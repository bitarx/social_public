<?php
/**
 * プレゼント振込シェル
 *
 * @author imanishi 
 * @param arg0:host arg1:kind(1:カード 2:アイテム 3:ペニー) arg2:targetId(ペニーの場合は金額)
 */
App::uses('AppModel', 'Model');

class AddPresentShell extends AppShell {


    public static $message = 'レイドボス不具合のお詫び';

    public $uses = array('UserPresentBox', 'RaidMaster');
 
    /**
     * バッチ開始前の処理
     */
    public function startup()
    {
        parent::startup();
        $this->cleanup();
    }
 
    /**
     * バッチのメイン処理
     */
    public function main() {

        if (empty($this->args[0]) || empty($this->args[1]) || empty($this->args[2])) {
            $this->out("引数が不足しています");
            die;
        }

        $kind   = $this->args[1];
        $target = $this->args[2];
        $num = 1;

        // 対象者リスト
        $where = array(
            'RaidMaster.created < ' => '2015-02-06 23:00:00' 
        );
        $field = array('DISTINCT (RaidMaster.user_id)');
        $list = $this->RaidMaster->getAllFind($where, $field, 'all', array(), 0, 0, -1);

        if (!empty($list)) {

            $values = array();
            foreach ($list as $val) {
                $values[] = array($val['user_id'], $kind, $target, $num, self::$message);
            }

            $this->UserPresentBox->begin();
            try {

                $this->UserPresentBox->registPBox($values);

            } catch (AppException $e) {
                $this->UserPresentBox->rollback();
                $this->log($e->errmes);
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
            }
            $this->UserPresentBox->commit();
        }
    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
