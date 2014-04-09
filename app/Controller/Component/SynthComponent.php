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
     * @return array 強化後のカードデータ
     */
    public function doSynthUp($baseCard, $targetList) {
        
        foreach ($targetList as $key => $val) {
            $baseCard['hp'] = $baseCard['hp'] + floor($val['hp_max'] / 10);
            $baseCard['hp_max'] = $baseCard['hp_max'] + floor($val['hp_max'] / 10);
            $baseCard['atk'] = $baseCard['atk'] + floor($val['atk'] / 10);
            $baseCard['def'] = $baseCard['def'] + floor($val['def'] / 10);
        }
         
        return $baseCard;
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
