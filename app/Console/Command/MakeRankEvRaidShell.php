<?php
/**
 * レイドイベントランキング生成
 *
 * @author imanishi 
 * @param arg0:host arg1:公式ユーザーID arg2:テスト送信対象ユーザーID
 */
App::uses('AppModel', 'Model');
App::uses('ComponentCollection', 'Controller');
App::uses('CommonComponent', 'Controller/Component');

class MakeRankEvRaidShell extends AppShell {

    public static $enemyId = 2000;

    public $components = array('Cookie', 'Common');

    public $uses = array('User', 'SnsUser', 'EvRaid', 'EvRaidRankFirst', 'EvRaidRankSecond', 'RaidDamage');
 
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
        if ($now < $data['1st_end_time']) {
            // 前半
            $start = $data['start_time'];
            $end   = $data['1st_end_time'];
        } else {
            // 後半
            $start = $data['1st_end_time'];
            $end   = $data['end_time'];
            $tarm = 2;
        }

        $list = $this->RaidDamage->makeRank($start, $end, self::$enemyId);
//var_dump($list);
        // ランクづけ
        $list = $this->Common->addRank($list);

        $values = array();
        foreach ($list as $val) {
            $values[] = array($val['rank'], $val['user_id'], $val['cnt']);
        }

        if (!empty($values) && 1 <= count($values)) {

            if (1 == $tarm) {
                // 前半
                $this->EvRaidRankFirst->begin();
                try {

                    $this->EvRaidRankFirst->query('TRUNCATE ev_raid_rank_firsts;');
                    $field = array('rank', 'user_id', 'point');
                    $this->EvRaidRankFirst->insertBulk($field, $values, $ignore = 1);

                } catch (AppException $e) {
                    $this->EvRaidRankFirst->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->EvRaidRankFirst->commit();
            } else {
                // 後半
                $this->EvRaidRankSecond->begin();
                try {

                    $this->EvRaidRankSecond->query('TRUNCATE ev_raid_rank_seconds;');
                    $field = array('rank', 'user_id', 'point');
                    $this->EvRaidRankSecond->insertBulk($field, $values, $ignore = 1);

                } catch (AppException $e) {
                    $this->EvRaidRankSecond->rollback();
                    $this->log($e->errmes);
                    $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM ));
                }
                $this->EvRaidRankSecond->commit();

            }
        }

        exec('chmod -R 777 ../../tmp' );
    }
 
    /**
     * 独自のデータを初期化する処理
     */
    public function cleanup() {
    }
}
