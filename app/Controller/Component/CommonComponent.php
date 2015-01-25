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

        mt_srand();
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

        mt_srand();
        $ret = mt_rand($min, $max);
        return $ret;
    }

    /**
     * キーの特定文字列を除去して残りを配列に格納
     *
     * @author imanishi 
     * @param array $params 元の配列
     * @param str $str 特定文字列
     * @return array 除去後のキーを格納した配列
     */
    public function getParamsInKey($params, $str) {

        $keys = array();
        foreach ($params as $key => $val) {
            if (false !== strpos($key, $str)) {
                $keys[] = str_replace($str, '', $key);
            }
        }
        return $keys;
    }

    /**
     * キャリア判定
     *
     * @return 1:Android 2:iPhone
     */
    public function judgeCarrer()
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) return "";

        $UA = $_SERVER['HTTP_USER_AGENT'];
        // Android
        if (ereg("Android.*Mobile", $UA)) {
             return CARRER_ANDROID;
        // iPhone
        } elseif (ereg("iPhone|iPod", $UA)) {
             return CARRER_IPHONE;
        // WindowsPhone
        } elseif (ereg("Windows.*Phone", $UA)) {
             return CARRER_WINPHONE;
        }else{
             // PC・タブレット
             return CARRER_PC;
        }
    }

    /**
     * 経験値減算
     *
     * @param int $exp
     * @param int $level
     * @return int 減算後の経験値
     */
    public function expMinus($exp, $level) {

        $minus = floor( $level / 10 ); 
        $exp -= $minus;
        if ($exp < 0) $exp = 0;
        return $exp;
    }

    /**
     * 現在時刻
     *
     * @return string Y-m-d H:i:s
     */
     public function nowDate() {
         return date("Y-m-d H:i:s");
     }

     /**
      * ランダム英数字生成
      *
      * @param 文字数
      */
    public function makeRandStr($length) {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str))];
        }
        return $r_str;
    }

    /**
     * 時：分：秒を秒に変換
     */
    public function h2s($hours) {
           $t = explode(":", $hours);
           $h = $t[0];
           if (isset($t[1])) {
            $m = $t[1];
           } else {
            $m = "0";
           } 
           if (isset($t[2])) {
            $s = $t[2];
           } else {
            $s = "0";
           } 
           return ($h*60*60) + ($m*60) + $s;
    }
}
