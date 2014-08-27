<?php
/**
 * ガチャコンポーネント
 */
App::uses('Component', 'Controller');
class GachaComponent extends Component {

//    public $uses = array('CardGroup');

    /**
     * ガチャ演出の抽選
     *
     * @author imanishi 
     * @param int $rareLevel 当選結果のレア度
     * @return int 抽選結果1～5 レア度不正で0
     */
    public function doProductLot($rareLevel) {

        switch ($rareLevel):
            case 1:
                for ($i = 1; $i <= 100; $i++) {
                    if ($i <= 70) {
                       $ary[$i] = 1;
                    } elseif ($i <= 90) {
                       $ary[$i] = 2;
                    } else {
                       $ary[$i] = 3;
                    }
                }
            break;
            case 2:
                for ($i = 1; $i <= 100; $i++) {
                    if ($i <= 50) {
                       $ary[$i] = 2;
                    } elseif ($i <= 75) {
                       $ary[$i] = 1;
                    } elseif ($i <= 90) {
                       $ary[$i] = 3;
                    } else {
                       $ary[$i] = 4;
                    }
                }
            break;
            case 3:
                for ($i = 1; $i <= 100; $i++) {
                    if ($i <= 50) {
                       $ary[$i] = 3;
                    } elseif ($i <= 75) {
                       $ary[$i] = 2;
                    } elseif ($i <= 90) {
                       $ary[$i] = 4;
                    } else {
                       $ary[$i] = 5;
                    }
                }
            break;
            case 4:
                for ($i = 1; $i <= 100; $i++) {
                    if ($i <= 50) {
                       $ary[$i] = 4;
                    } elseif ($i <= 75) {
                       $ary[$i] = 3;
                    } elseif ($i <= 90) {
                       $ary[$i] = 2;
                    } else {
                       $ary[$i] = 5;
                    }
                }
            break;
            case 5:
                for ($i = 1; $i <= 100; $i++) {
                    if ($i <= 75) {
                       $ary[$i] = 5;
                    } elseif ($i <= 90) {
                       $ary[$i] = 4;
                    } else {
                       $ary[$i] = 3;
                    }
                }
            break;
            default:
               return 0;
        endswitch;

        $lot = mt_rand(1, 100);
        $ret = $ary[$lot];

        return $ret;
    }
}
