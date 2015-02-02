<?php
/**
 * メール一括送信スクリプト
 *
 * @author imanishi 
 * @param arg0:メールテキストID arg1:都道府県コード(99はテスト) arg2:リミット
 */
App::uses('CakeEmail', 'Network/Email');

class SendMailShell extends AppShell {

    private $_from = 'homelibrary@renth.sakura.ne.jp';

    public $uses = array('MailList', 'MailTxt');
 
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
            $this->out("第一引数にmailTxtIdの指定がありません");
            die;
        }

        $mailTxtId = $this->args[0];
        
        // 都道府県コード
        $pref = 0;
        if (!empty($this->args[1])) {
            $pref = $this->args[1];
        }

        // リミット
        $limit = 0;
        if (!empty($this->args[2])) {
            $limit = $this->args[2];
        }

        // 送信リスト
        $where = array('end_flg' => 0);
        if (!empty($pref)) {
            $where['pref'] = $pref;
        }
        $list = $this->MailList->getAllFind($where, $field = array(), 'all', $order = array(), $limit);
var_dump($list);
        // 送信内容
        $where = array('mail_txt_id' => $mailTxtId);


        $data = $this->MailTxt->getAllFind($where, $field = array(), 'first');

        // 送信設定
        $base['subject'] = $data['subject'];
        $base['message'] = $data['body'];
        $header = "MIME-Version: 1.0\n"
        . "Content-Transfer-Encoding: BASE64\n"
        . "Content-Type: text/plain; charset=UTF-8\n"
        . "Message-Id: <" . md5(uniqid(microtime())) . "@sositelabo.co.jp>\n"
        . "From:" .mb_encode_mimeheader("ホームライブラリ事務局") ."<". $this->_from .">\n";

        $this->MailList->commit();
        foreach ($list as $val) {
            $base['to'] = $val['mail'];

            $message = str_replace('##name##', $val['name'], $base['message']);

            $val['del_flg'] = 1; 
            $this->MailList->save($val, false);

            // 送信
            $ret = mb_send_mail($base['to'], $base['subject'], $message, $header, "-f " . $this->_from );
            if ($ret) {
                $this->out("Success!!" . $base['to']);
            } else {
                $this->out("Failed!!! " . $base['to']);
            }
        } 
        $this->MailList->commit();
    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
