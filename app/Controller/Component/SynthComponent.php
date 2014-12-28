<?php
/**
 * 合成コンポーネント
 */
App::uses('Component', 'Controller');
class SynthComponent extends Component {


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
     * @param int   $bigSFlg 大成功は1
     * @return array 強化後のカードデータ
     */
    public function doSynthUp($baseCard, $targetList, &$upExp, &$bigSFlg) {

        $isAi  = 0;
        $isMai = 0;
        $isMi  = 0;
        $count = 0;
        $sameCnt = 0;

        foreach ($targetList as $key => $val) {

            // 属性存在チェック
            if ($val['attr'] == 1) $isAi = 1;
            if ($val['attr'] == 2) $isMai = 1;
            if ($val['attr'] == 3) $isMi = 1;

            // 素材総数
            $count++;

            $levelMulti = 9; 

            // 強化素材の補正
            if ($val['sozai_kind'] == 1) 
                $val['level'] = 205;

            // 同じ属性は大きくアップする
            if ($baseCard['attr'] == $val['attr']) {
                $levelMulti = 14; 

                $val['level'] *= 2;

                // ベースと同じ属性であればスキルレベルアップ
                $baseCard['skill_level'] += 1;

                // 強化素材であればさらにスキルアップ
                if ($val['sozai_kind'] == 1) {

                    $baseCard['skill_level'] += 14;
                }

                $sameCnt++;
            }
            
            $num = ($val['level'] * $levelMulti) + ($val['rare_level'] * 5);

            // ベースのレア度に応じて減算
            $ret = $num - ($baseCard['rare_level'] * 1);
            if ($ret < 2) $ret = 2;

            $upExp += $ret;
        }

        // 大成功判定
        if (!empty($isAi) && !empty($isMai) && !empty($isMi)) {
           // 素材が半分以上が同属性で全属性含んでいる 
           $ret = ($sameCnt / $count) * 10;
           if (5 <= $ret) {
               // 成功条件が揃っている場合、さらに抽選
               $int = mt_rand(1, 100);

               // 条件を満たせば75%大成功
               if ($int <= 75) {
                   // 大成功で経験値３倍
                   $upExp *= 3;
                   $bigSFlg = 1;
               }
           }
        }

        // スキルレベル最大
        if ( SKILL_LEVEL_MAX < $baseCard['skill_level'] ) 
            $baseCard['skill_level'] = SKILL_LEVEL_MAX;

        // レベルアップ回数
        $levelUpCnt = $this->getLevelUpNum($upExp, $baseCard['exp']);
        
        // レベルアップ
        for ($i = 1; $i <= $levelUpCnt; $i++) {
            $baseCard['hp']     = (int)floor($baseCard['hp_max'] * 1.02);
            $baseCard['hp_max'] = (int)floor($baseCard['hp_max'] * 1.02);
            $baseCard['atk']    = (int)floor($baseCard['atk'] * 1.03);
            $baseCard['def']    = (int)floor($baseCard['def'] * 1.03);
            $baseCard['level']++;
            // 最大レベルで終了
            if ($baseCard['card_level'] <= $baseCard['level']) {
                $levelMax = 1; 
                break;
            }
        }

        if ( isset($levelMax) && 1 == $levelMax ) {
            $upExp = ($i * 100) - $baseCard['exp'];
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
            $useMoney += ($val['atk'] + $val['def']) / 2;
        }
        return floor($useMoney);
    } 

    /**
     * 進化できるか判定
     *
     * @author imanishi 
     * @param array $baseCard ベースカードのデータ
     * @param array $targetCard 素材カードのデータ
     * @return  true:進化可能 false:不可 0:これ以上進化できない
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
