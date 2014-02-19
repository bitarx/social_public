<?php
/**
 * 共通コンポーネント
 */
App::uses('Component', 'Controller');
class CommonComponent extends Component {

    public $probField = 'prob';

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
}
