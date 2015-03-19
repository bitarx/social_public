<?php
/**
 * レイドイベントプレゼント振込
 *
 * @author imanishi 
 * @param arg0:host arg1:公式ユーザーID arg2:テスト送信対象ユーザーID
 */
App::uses('AppModel', 'Model');
App::uses('ComponentCollection', 'Controller');
App::uses('CommonComponent', 'Controller/Component');

class PresentEvRaidShell extends AppShell {

    public static $message = 'EVENT逆ブートキャンプで教姦です前半の報酬';

    public $components = array('Cookie', 'Common');

    public $uses = array('User', 'SnsUser', 'EvRaid', 'EvRaidRankFirst', 'EvRaidRankSecond', 'RaidDamage', 'UserPresentBox');
 
    /**
     * バッチ開始前の処理
     */
    public function startup()
    {
        $collection = new ComponentCollection();
        $this->Common = new CommonComponent($collection);
        parent::startup();
        $this->cleanup();
    }
 
    /**
     * バッチのメイン処理
     */
    public function main() {
        $this->out("バッチ処理を開始します");

        if (empty($this->args[0])) {
            $this->out("第一引数にホストドメインの指定がありません");
            die;
        }
        if (empty($this->args[1])) {
            $this->out("第2引数にイベントIDの指定がありません");
            die;
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

        $evRaidId = $this->args[1];

        $data = $this->EvRaid->getData($evRaidId);

        $now  = $this->Common->nowDate();

        $tarm = 1;
        if ($data['1st_end_time'] < $now && $now < $data['end_time']) {
            // 前半終了後半中
            $md = $this->EvRaidRankFirst;
        } elseif ($data['end_time'] < $now) {
            // 後半終了
            $md = $this->EvRaidRankSecond;
            self::$message = 'EVENT逆ブートキャンプで教姦です後半の報酬';
            $tarm = 2;
        } else {
            $this->out("振込期間ではありません");
            die;
        }

        // 最大ランク取得
        $maxRank = $md->getMaxRank();

        // 上位10%
        $one = ceil( $maxRank * 0.1 );
        $where = array(
            'rank <= ' => $one 
        );
        $oneList = $md->getAllFind($where);

        // 上位50%
        $tow = ceil( $maxRank * 0.5 );
        $where = array(
            'rank > '  => $one 
        ,   'rank <= ' => $tow 
        );
        $towList = $md->getAllFind($where);

        // 上位90%
        $three = ceil( $maxRank * 0.9 );
        $where = array(
            'rank > '  => $tow 
        ,   'rank <= ' => $three 
        );
        $threeList = $md->getAllFind($where);


        // プレゼント対象ID 
        $targetId = 88;

        // 上位１０％配列セット
        $num = 5;
        $oneValues = array();
        foreach ($oneList as $val) {
            $oneValues[] = array($val['user_id'], KIND_CARD, $targetId, $num, self::$message);
        }

        // 上位50％配列セット
        $num = 2;
        $towValues = array();
        foreach ($towList as $val) {
            $towValues[] = array($val['user_id'], KIND_CARD, $targetId, $num, self::$message);
        }

        // 上位90％配列セット
        $num = 1;
        $threeValues = array();
        foreach ($threeList as $val) {
            $threeValues[] = array($val['user_id'], KIND_CARD, $targetId, $num, self::$message);
        }


        // 振込実行
        if (!empty($oneValues) && !empty($towValues) && !empty($threeValues)) {

            if (1 == $tarm) {
                // 前半
                $this->UserPresentBox->begin();
                try {

                    $field = array('user_id', 'kind', 'target', 'num', 'message');
                    $this->UserPresentBox->insertBulk($field, $oneValues, $ignore = 1);
                    $this->UserPresentBox->insertBulk($field, $towValues, $ignore = 1);
                    $this->UserPresentBox->insertBulk($field, $threeValues, $ignore = 1);

                } catch (AppException $e) {
                    $this->UserPresentBox->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->UserPresentBox->commit();
            } else {
                // 後半
                $this->UserPresentBox->begin();
                try {

                    $field = array('user_id', 'kind', 'target', 'num', 'message');
                    $this->UserPresentBox->insertBulk($field, $oneValues, $ignore = 1);
                    $this->UserPresentBox->insertBulk($field, $towValues, $ignore = 1);
                    $this->UserPresentBox->insertBulk($field, $threeValues, $ignore = 1);

                } catch (AppException $e) {
                    $this->UserPresentBox->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->UserPresentBox->commit();

            }
        }

    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
