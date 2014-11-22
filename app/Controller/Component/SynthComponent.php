<?php
/**
 * 合成コンポーネント
 */
App::uses('Component', 'Controller');
class SynthComponent extends Component {

//    public $uses = array('CardGroup');

    /**
     * 進化合成を実行する
     *
     * @author imanishi 
     * @param int $baseCardId ベースカードのカードId
     * @param int $targetCardId 素材カードのカードId
     * @return int 進化後のカードID
     */
    public function doSynthEvol($baseCardId, $targetCardId) {
        $cardGroup = ClassRegistry::init('CardGroup');
        $cardGroupData = $cardGroup->getCardGroup ($baseCardId);

        $ret = $cardGroupData['next']; 

        return $ret;
    }

    /**
     * 強化合成を実行する
     *
     * @author imanishi 
     * @param array $baseCard ベースカードのデータ
     * @param array $targetList 素材カードリスト
     * @param int   $upExp 加算される経験値
     * @return array 強化後のカードデータ
     */
    public function doSynthUp($baseCard, $targetList, &$upExp) {

        foreach ($targetList as $key => $val) {

            $levelMulti = 8; 

            // 強化素材の補正
            if ($val['sozai_kind'] == 1) 
                $val['level'] = 230;

            // 同じ属性は大きくアップする
            if ($baseCard['attr'] == $val['attr']) {
                $levelMulti = 14; 

                $val['level'] *= 2;

                // ベースと同じ属性であればスキルレベルアップ
                $baseCard['skill_level'] += 1;

                // 強化素材であればさらにスキルアップ
                if ($val['sozai_kind'] == 1) {

                    $baseCard['skill_level'] += 4;
                }
            }
            $upExp += ($val['level'] * $levelMulti) + ($val['rare_level'] * 5);

            // ベースと同じカードであればさらにスキルレベルアップ
            if ($baseCard['card_id'] == $val['card_id']) {
                $baseCard['skill_level'] += 2;
            }
        }

        // スキルレベル最大
        if ( SKILL_LEVEL_MAX < $baseCard['skill_level'] ) 
            $baseCard['skill_level'] = SKILL_LEVEL_MAX;

        // レベルアップ回数
        $levelUpCnt = $this->getLevelUpNum($upExp, $baseCard['exp']);

        // レベルアップ
        for ($i = 1; $i <= $levelUpCnt; $i++) {
            $baseCard['hp']     = (int)floor($baseCard['hp_max'] * 1.01);
            $baseCard['hp_max'] = (int)floor($baseCard['hp_max'] * 1.01);
            $baseCard['atk']    = (int)floor($baseCard['atk'] * 1.02);
            $baseCard['def']    = (int)floor($baseCard['def'] * 1.02);
            $baseCard['level']++;
            // 最大レベルで終了
            if ($baseCard['card_level'] <= $baseCard['level']) {
                $levelMax = 1; 
                break;
            }
        }

        // 経験値更新
        $baseCard['exp'] = ($baseCard['exp'] + $upExp) % 100;
        if (isset($levelMax)) {
            $baseCard['exp'] = 0;
        }
         
        return $baseCard;
    }

    /**
     * レベルアップ回数を算出
     *
     * @author imanishi 
     * @param int $upExp 加算経験値
     * @param int $exp 加算前経験値
     * @return int レベルアップ回数 
     */
    public function getLevelUpNum($upExp, $exp) { 
        $levelUpCnt = 0;

        $exp = $exp % 100;

        $levelUpCnt = floor(($upExp + $exp) / 100);

        return $levelUpCnt;
    } 

    /**
     * 進化合成に必要なペニーを返却
     *
     * @author imanishi 
     * @param array $baseCard ベースカードのデータ
     * @return int 金額
     */
    public function useMoneyEvol($baseCard) { 
        $useMoney = $baseCard['rare_level'] * 1000;
        return $useMoney;
    } 

    /**
     * 強化合成に必要なペニーを返却
     *
     * @author imanishi 
     * @param array $list 素材カードリスト
     * @return int 金額
     */
    public function useMoneyUp($list) { 
        $useMoney = 0;
        foreach ($list as $val) {
            $useMoney += ($val['atk'] + $val['def']);
        }
        return $useMoney;
    } 

    /**
     * 進化できるか判定
     *
     * @author imanishi 
     * @param array $baseCard ベースカードのデータ
     * @param array $targetCard 素材カードのデータ
     * @return bool true:進化可能 false:不可
     */
    public function judgeEvol($baseCard, $targetCard) { 

        // 進化に必要なレベルは最大レベル
        $needLevel = $baseCard['card_level'];

        // 必要レベルに達していないときは不可
        if ($baseCard['level'] < $needLevel) return false;

        // 素材が同じグループのカードであるか
        $cardGroup = ClassRegistry::init('CardGroup');
        $judge = $cardGroup->judgeSameCardGroup($baseCard['card_id'],$targetCard['card_id']);

        return $judge;
    } 
}
