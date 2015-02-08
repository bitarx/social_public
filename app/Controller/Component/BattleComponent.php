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
     * 敵とのバトルを実行する
     *
     * @author imanishi 
     * @param array $selfCards 攻撃側のカードデータ
     * @param array $targetCards 防御側のカードデータ
     * @param int   $kind  1:プレイヤー攻撃 2:敵攻撃
     * @param array $battleLogTurn 戦闘情報
     * @return array バトル結果
     */
    public function doBattleEnemy($selfCards, $targetCards, $kind, &$battleLogTurn) {

        $num = 0;
        foreach ($selfCards as $deckNum => $val) {

            $targetNum = count($targetCards) - 1;
            $selfData = $val['UserCard'];

            if (empty($selfData['atk'])) continue;

            // 敵攻撃
            if ($kind == 2) {

                // プレイヤーカードを全体攻撃
                foreach ($targetCards as $target => $val) {
                    $targetData = $targetCards[$target]['UserCard'];
                    if (!empty($targetData['card_id'])) {
                        $battleLogTurn[$target]['targetData'] = array(
                            'card_id' => $targetData['card_id']
                        ,   'hp'      => $targetData['hp']
                        );

                        $damage = $this->calcDamage($selfData, $targetData);
                        $battleLogTurn[$target]['damage'] = $damage;
                        $targetCards[$target]['UserCard']['hp'] -= $damage;

                        $num++;
                    } else {
                        // デッキに設定がない
                        $targetCards[$target]['UserCard']['hp'] = 0;
                    }
                }

                foreach ($targetCards as $key => $val) {
                    // HPがゼロになった場合
                    if (isset($targetCards[$key]['UserCard']['hp']) && $targetCards[$key]['UserCard']['hp'] <= 0) {
                        unset($targetCards[$key]);
                        $cnt = count($targetCards);
                        if ($cnt <= 0) {
                            $battleLogTurn[$key]['targetData'] = array(
                                'card_id' => $targetData['card_id']
                            ,   'hp'      => 0
                            );
                            $battleLogTurn[$key]['damage'] = 0;
                            break 2;
                        }
                    }
                }

            // プレイヤー攻撃
            } else if ($kind = 1) {

                mt_srand();
                $target = mt_rand(0, $targetNum);
                $targetData = $targetCards[$target]['UserCard'];

                $battleLogTurn[$deckNum]['targetData'] = array(
                    'enemy_id' => $targetData['enemy_id']
                ,   'hp'       => $targetData['hp']
                );

                $damage = $this->calcDamage($selfData, $targetData);
                $battleLogTurn[$deckNum]['damage'] = $damage;
                $targetCards[$target]['UserCard']['hp'] -= $damage;

                $num++;
                
                // 攻撃対象のHPがゼロになった場合
                if ($targetCards[$target]['UserCard']['hp'] <= 0) {
                    unset($targetCards[$target]);
                    $cnt = count($targetCards);
                    if ($cnt <= 0) {
                        $battleLogTurn[$deckNum]['targetData'] = array(
                            'enemy_id' => $targetData['enemy_id']
                        ,   'hp'       => 0
                        );
                        break;
                    }

                    $targets = array();
                   
                    foreach ($targetCards as $v) {
                        $targets[] = $v; 
                    }
                    $targetCards = $targets;
                }

            } else {
                break;
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
        mt_srand();
        $multi = mt_rand(93 , 107) / 100;
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
     * @param array $battleLog 結果ログ(スキル配列)
     * @return void
     */
    public function doSkill($skillData, $key, &$selfCards, &$targetCards, &$logSkill, $kind = 'player') {
$this->log($skillData); 
        switch($skillData['effect'])
        {
            // 防御
            case 1: 
                $eff = 'def';
                break;

            // 攻撃
            case 2: 
                $eff = 'atk';
                break;
        }

        // スキルデータをログ配列に格納
        $logSkill[$key]['words'] = '【' . $skillData['skill_name'] . '】' . $skillData['skill_words'];

        // 自分をアップ
        if($skillData['updown'] == 1 && $skillData['target'] == 1) {
            $up = $selfCards[$key]['UserCard'][$eff] *  ($skillData['percent'] / 100); 
            $selfCards[$key]['UserCard'][$eff] += floor($up);

            if ($kind == 'enemy') {
                $logSkill[$key]['type'] = 5;
            } else {
                $logSkill[$key]['type'] = 1;
            }
        }
        // 相手をダウン
         elseif ($skillData['updown'] == 2 && $skillData['target'] == 2) 
        {
        /*
            $tnum = count($targetCards) - 1;
            $tKey = mt_rand(0, $tnum);

            $down = $targetCards[$tKey]['UserCard'][$eff] *  ($skillData['percent'] / 100); 
            $targetCards[$tKey]['UserCard'][$eff] -= floor($down);

            $targetCards['t_key'] = $tKey;

            $logSkill[$key]['type'] = 6;
        */
        }
        // 味方をアップ
         elseif ($skillData['updown'] == 1 && $skillData['target'] == 3) 
        {
            foreach ($selfCards as $no => $val) {
                $up = $selfCards[$no]['UserCard'][$eff] *  ($skillData['percent'] / 100); 
                $selfCards[$no]['UserCard'][$eff] += floor($up);
            }

            if ($kind == 'enemy') {
                $logSkill[$key]['type'] = 5;
            } else {
                $logSkill[$key]['type'] = 2;
            }
        }
        // 相手全体をダウン
         elseif ($skillData['updown'] == 2 && $skillData['target'] == 4) 
        {
            foreach ($targetCards as $no => $val) {
                $down = $targetCards[$no]['UserCard'][$eff] *  ($skillData['percent'] / 100); 
                $targetCards[$no]['UserCard'][$eff] -= floor($down);
            }

            if ($kind == 'enemy') {
                $logSkill[$key]['type'] = 4;
            } else {
                $logSkill[$key]['type'] = 6;
            }
        }


    }

}
