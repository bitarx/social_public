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

        $ret = 0;
        if ($cardGroupData['card_id'] == $targetCardId) {
            $ret = $cardGroupData['next']; 
        }

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


}
