<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $recursive = 0;

    protected $_filDelFlg = 'delete_flg';

    protected $_pageLimit = 10;

    /**
     * 条件検索
     *
     * @author imanishi 
     * @param array $where  検索条件
     * @param array $fields 取得カラム
     * @param string $kind  findメソッド第一引数の値
     * @param array $order  ソート　array('Model.created DESC')
     * @param int $limit
     * @param int $offset
     * @return array 検索結果
     */
    public function getAllFind( $where = array(), $fields = array(), $kind = 'all', $order = array(), $limit = 0, $offset = 0, $recursive = 0 ) {

        $tableAlias = $this->getTableAlias();
        $options = array();
        $conditions = array($tableAlias. '.'. $this->_filDelFlg => 0);

        if (0 < count($where)) {
            foreach ($where as $field => $val) {
                if ($field == 'OR') {
                    foreach ($val as $f => $v) {
                        $conditions['OR'][$tableAlias. '.'. $f] = $v; 
                    }
                } else {
                    $conditions[$tableAlias. '.'. $field] = $val; 
                }
            }
        }
        if (0 < count($fields)) {
            $options['fields'] = $fields;
        }

        $options['conditions'] = $conditions;

        // ソート
        if (0 < count($order)) { 
            $options['order'] = $order;
        } 

        // リミット
        if (!empty($limit)) { 
            $options['limit'] = $limit;
        } 

        // オフセット
        if (!empty($offset)) { 
            $options['offset'] = $order;
        } 

        // 結合レベル
        if (0 < $recursive) { 
            $options['recursive'] = $recursive;
        } 

        $ret = $this->find($kind, $options);

        $data = array();
        if (!empty($ret)) {
            if ($kind == 'first') {
                $row = array();
                foreach ($ret as $val) {
                     $row = array_merge($row, $val);
                }
                $data = $row;
            } else {
                foreach ($ret as $values) {
                    $row = array();
                    foreach ($values as $val) {
                         $row = array_merge($row, $val);
                    }
                    $data[] = $row;
                }
            }
        }
        return $data;
    }


    /**
     * バルクインサート
     *
     * @author imanishi 
     * @param array  $fields 登録カラム
     * @param array  $data   登録データ(登録フィールドの順番)
     * @param string $ignoreFlg  1でIGNORE INSERT
     * @return bool 結果
     */
    public function insertBulk( $fields = array(), $data = array(), $ignoreFlg = 0 ) {

        $date = date('Y-m-d H:i:s');

        $holder = '(' . implode(',', array_fill(0, count($fields), '?')) . ')';
        $holders = implode(',', array_fill(0, count($data), $holder));
        $params = array();
        foreach ($data as $val) {
            $i = 0;
            foreach ($fields as $field) {
                if ($field == 'created' || $field == 'modified') {
                    $params[] = $date;
                } else {
                    $params[] = $val[$i];
                }
                $i++;
            }
        }
        $fields = implode(',', $fields);

        $sql = "INSERT ";

        if (1 == $ignoreFlg) $sql .= "IGNORE ";

        $sql .= "INTO {$this->useTable} ({$fields}) VALUES {$holders}";
        $ret = $this->query($sql, $params);
        if ($ret === false) {
            $this->log( $this->useTable . ' save faild : Sql faild');
            return false;
        }

        if ($ignoreFlg != 1 && $this->getAffectedRows() != count($data)) {
            $this->log( $this->useTable . ' save faild : getAffectedRows');
            return false;
        }
        return true;
    }


    public function begin() {
        $dataSource = $this->getDataSource();
        $dataSource->begin($this);
    }

    public function commit() {
        $dataSource = $this->getDataSource();
        $dataSource->commit($this);
    }

    public function rollback() {
        $dataSource = $this->getDataSource();
        $dataSource->rollback($this);
    }

    /**
     * テーブルエイリアス生成
     *
     * @author imanishi 
     * @return string テーブルエイリアス
     */
     public function getTableAlias() {
         $table = substr($this->useTable, 0, -1);
         $ary = explode('_', $table);
         $tablename = '';
         foreach ($ary as $val) {
             $tablename .= ucfirst($val); 
         }
         return $tablename;
     }

     /**
      * デバッグ:最後のクエリを出力
      */
    public function qlog() {

         $log = $this->getDataSource()->getLog(false, false);
         $num = count($log['count']);
         $querylog = $log['log'][$num -1 ]['query'];
         $this->log($querylog);
         return $querylog;
    }
}
