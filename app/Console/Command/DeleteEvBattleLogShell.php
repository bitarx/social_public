<?php
/**
 * EvBattleLog削除シェル
 *
 * @author imanishi 
 * @param arg0:host
 */
App::uses('AppModel', 'Model');

class DeleteEvBattleLogShell extends AppShell {


    public $uses = array('EvBattleLog');
 
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

        if (empty($this->args[0])) {
            $this->out("第一引数にDB環境の指定がありません");
            die;
        }

        $this->EvBattleLog->begin();
        try {

            // 1週間前
            $date = date("Y-m-d H:i:s", time() - 60*60*24*7);

            $where = array('EvBattleLog.created < ' => $date);
            $this->EvBattleLog->deleteAll($where);

        } catch (AppException $e) {
            $this->EvBattleLog->rollback();
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
        }
        $this->EvBattleLog->commit();
    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
