<?php
/**
 * バトルコンポーネント
 */
App::uses('Component', 'Controller');
class BattleComponent extends Component {

    // 重みのフィールド名
    public $probField = 'prob';

    // 日の変わる時間
    public $dayChangeH = 8;

    /**
     * 5vs5のバトルを実行する
     *
     * @author imanishi 
     * @param array $selfCards 攻撃側のカードデータ
     * @param array $targetCards 防御側のカードデータ
     * @return array バトル結果
     */
    public function doBattle($selfCards, $targetCards) {
        foreach ($selfCards as $val) {
            
            $targetNum = count($targetCards) - 1;
            $selfData = $val['UserCard'];
            $target = mt_rand(0, $targetNum);
            $targetData = $targetCards[$target]['UserCard'];

            $damage = $this->calcDamage($selfData, $targetData);
            $targetCards[$target]['UserCard']['hp'] -= $damage;

            // 攻撃対象のHPがゼロになった場合
            if ($targetCards[$target]['UserCard']['hp'] <= 0) {
                unset($targetCards[$target]);
                $cnt = count($targetCards);
                if ($cnt <= 0) break;
               
                foreach ($targetCards as $v) {
                    $targets[] = $v; 
                }
                $targetCards = $targets;
            }
        }
        return $targetCards;
    }

    /**
     * ダメージの計算
     *
     * @author imanishi 
     * @param string $selfData 攻撃側カードデータ
     * @param string $targetData 防御側カードデータ
     * @return int 与えたダメージ
     */
    public function calcDamage($selfData, $targetData) {
        $multi = mt_rand(90 , 110) / 100;
        $base = (($selfData['atk'] * 2) * $multi) - ( $targetData['def'] * $multi );     
        if ($base <= 0) {
            $ret = 0;
        } else {
            $ret = floor($base * $multi);
        }

        return $ret; 

    }

    /**
     * スキルの実行
     *
     * @author imanishi 
     * @param string $skillData スキルデータ
     * @param int key 攻撃側何番目のカードか
     * @param string $selfCards 攻撃側カードデータ
     * @param string $targetCards 防御側カードデータ
     * @return void
     */
    public function doSkill($skillData, $key, &$selfCards, &$targetCards) {

        switch($skillData['effect'])
        {
            // 防御
            case 1: 
                // 自分をアップ
                if($skillData['updown'] == 1 && $skillData['target'] == 1) {
                    $up = $selfCards[$key]['def'] *  ($skillData['percent'] / 100); 
                    $selfCards[$key]['def'] += floor($up);
                }
                break;

            // 攻撃
            case 2: 
                // 自分をアップ
                if ( $skillData['updown'] == 1 && $skillData['target'] == 1) {

                    $up = $selfCards[$key]['atk'] *  ($skillData['percent'] / 100); 
                    $selfCards[$key]['atk'] += floor($up);
                }
                break;
        }

    }

}
