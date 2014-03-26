<?php
/**
 * 共通コンポーネント
 */
App::uses('Component', 'Controller');
class CommonComponent extends Component {

    // 重みのフィールド名
    public $probField = 'prob';

    // 日の変わる時間
    public $dayChangeH = 8;

    /**
     * prob系テーブルのデータより抽選を行う
     *
     * @author imanishi 
     * @param array $list 確率リスト
     * @return array 当選レコード
     */
    public function doLot($list) {

        $sum = -1;
        $lot = array();
        foreach ($list as $key => $val) {
            for ($i = 0; $i < $val[$this->probField]; $i++) {
                $lot[] = $key;
                $sum++;
            }
        }

        $hit = mt_rand(0, $sum);
        
        $data = $list[$lot[$hit]];
        return $data;
    }

    /**
     * 現在は当日であるかを判定
     *
     * @author imanishi 
     * @param string $modified 判定の起点となる時間
     * @return bool true:当日 false:当日ではない
     */
    public function isToday($modified) {
    
        $targetTimeSp = strtotime($modified);
        $nowTimeSp = time();
        $targetH = date("G", $targetTimeSp);
        $nowH = date("G");

        $passTimeSp = $nowTimeSp - $targetTimeSp;
        if (3600 < $passTimeSp) {
            return false;
        } else {
            if ($this->dayChangeH <= $nowH) {
                if ($targetH < $this->dayChangeH) {
                    return false;
                } else {
                    return true;
                }
            } else {
                if ($targetH < $this->dayChangeH) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    /**
     * レンジで抽選
     *
     * @author imanishi 
     * @param int $baseInt 基準となる数値
     * @param int $range 上下のレンジ
     * @return int 抽選結果
     */
    public function lotRange($baseInt, $range) {
        $min = $baseInt - $range;
        $max = $baseInt + $range;

        $ret = mt_rand($min, $max);
        return $ret;
    }
}
