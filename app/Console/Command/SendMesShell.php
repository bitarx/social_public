<?php
/**
 * Message送信スクリプト
 *
 * @author imanishi 
 * @param arg0:host arg1:公式ユーザーID arg2:テスト送信対象ユーザーID
 */
App::uses('AppModel', 'Model');

class SendMesShell extends AppShell {


    protected static $title = '鎮激のエロイーズにレイドボス機能を追加しました';

    protected static $body = '行動力不要のレイドボスバトルで特別報酬をGET!';

    protected static $limit = 100; // １回の送信件数


    public $uses = array('User', 'SnsUser', 'TmpSendMe');
 
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
        $this->out("バッチ処理を開始します");

        if (empty($this->args[0])) {
            $this->out("第一引数にDB環境の指定がありません");
            die;
        }

        $officialUserId = null;
        if (!empty($this->args[1])) {
            $officialUserId = $this->args[1];
        }


        // SNSクラス生成
        if ( 'hills' == PLATFORM_ENV ) {
            $this->snsUtil = ApplihillsUtil::create();
        } elseif ( 'waku' == PLATFORM_ENV ) {
            $this->snsUtil = WakuUtil::create();
        } elseif ( 'niji' == PLATFORM_ENV ) {
            $this->snsUtil = NijiUtil::create();
        } else {
            $this->out('argv error!');
            die;
        }

//        $targetUrl = BASE_URL . 'RaidQuests/index';
        $targetUrl = null;

        // 送信済みユーザー
        $endUserList = $this->TmpSendMe->getList();

        $notIn = array();
        if (!empty($endUserList)) {
            $notIds = array();
            foreach ($endUserList as $val) {
                $notIds[] = $val['sns_user_id'];
            }
            $notIn = array('sns_user_id' => $notIds);
        }

        $recipients = array();

        if (!empty($this->args[2])) {
            // テスト
            $recipients = array($this->args[2]);

        } else {

            $list = $this->User->getStillSendUserList(self::$limit, $notIn);
            foreach ($list as $val) {
                $recipients[] = $val['sns_user_id'];
                $values[] = array($val['sns_user_id'], $val['user_id']);
            }

            if (!empty($values) && 1 < count($values)) {
                $this->TmpSendMe->begin();
                try {

                    $field = array('sns_user_id', 'user_id');
                    $this->TmpSendMe->insertBulk($field, $values, $ignore = 1);

                } catch (AppException $e) {
                    $this->TmpSendMe->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->TmpSendMe->commit();
            }
        }

        if (!empty($recipients)) {
            $this->snsUtil->createMessage(self::$title, self::$body, $recipients, $targetUrl, PLATFORM_APP_ID, $officialUserId); 
        }
    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
