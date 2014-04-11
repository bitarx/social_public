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
            $upExp += ($val['level'] * 8) + ($val['rare_level'] * 5);
        }

        // レベルアップ回数
        $levelUpCnt = $this->getLevelUpNum($upExp, $baseCard['exp']);

        // レベルアップ
        for ($i = 1; $i <= $levelUpCnt; $i++) {
            $baseCard['hp']     = (int)floor($baseCard['hp_max'] * 1.1);
            $baseCard['hp_max'] = (int)floor($baseCard['hp_max'] * 1.1);
            $baseCard['atk']    = (int)floor($baseCard['atk'] * 1.1);
            $baseCard['def']    = (int)floor($baseCard['def'] * 1.1);
            $baseCard['level']++;
        }

        // 経験値更新
        $baseCard['exp'] = ($baseCard['exp'] + $upExp) % 100;
         
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
     * 進化合成に必要なゴールドを返却
     *
     * @author imanishi 
     * @param array $baseCard ベースカードのデータ
     * @return int 金額
     */
    public function useMoneyEvol($baseCard) { 
        $useMoney = $baseCard['Card']['rare_level'] * 800;
        return $useMoney;
    } 

    /**
     * 強化合成に必要なゴールドを返却
     *
     * @author imanishi 
     * @param array $list 素材カードリスト
     * @return int 金額
     */
    public function useMoneyUp($list) { 
        $useMoney = 0;
        foreach ($list as $val) {
            $useMoney += ($val['rare_level'] * $val['level']) * 50;
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

        // 最大レベルの半分
        $halfLevel = $baseCard['Card']['card_level'] / 2;

        // 半分に達していないときは不可
        if ($baseCard['level'] < $halfLevel) return false;

        // 素材が同じグループのカードであるか
        $cardGroup = ClassRegistry::init('CardGroup');
        $judge = $cardGroup->judgeSameCardGroup($baseCard['Card']['card_id'],$targetCard['card_id']);

        return $judge;
    } 
}
