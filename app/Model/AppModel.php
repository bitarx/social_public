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
App::import('Component', 'Common');

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



    public function __construct($id = false, $table = null, $ds = null) {

        // 環境によってデータベース設定変更
        if (env('APP_ENV') != 'dev') {
            $this->useDbConfig = APP_ENV;
            if (PLATFORM_ENV != 'hills') {
                $this->useDbConfig .= '_' . PLATFORM_ENV;
            }
        } 

        parent::__construct( $id, $table, $ds );
    }

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
    public function getAllFind( $where = array(), $fields = array(), $kind = 'all', $order = array(), $limit = 0, $offset = 0, $recursive = 0, $joins = array() ) {

        $tableAlias = $this->getTableAlias();
        $options = array();
        if (!isset($where[$this->_filDelFlg])) {
            $conditions = array($tableAlias. '.'. $this->_filDelFlg => 0);
        }

        if (0 < count($where)) {
            foreach ($where as $field => $val) {
                if ($field == 'OR' || $field == 'NOT' || $field == 'AND') {
                    foreach ($val as $f => $v) {
                        $fname = $tableAlias. '.'. $f;
                        if ($f == 'OR' || $f == 'NOT' || $f == 'AND') {
                            $fname = $f;
                        }
                        $conditions[$field][$fname] = $v; 
                    }
                } else {
                    if (false === strpos($field, '.')) {
                        $conditions[$tableAlias. '.'. $field] = $val; 
                    } elseif (false !== strpos($field, 'Not.')) {
                        $field = str_replace('Not.', '', $field);
                        $conditions[$field] = $val; 
                    } else {
                        $conditions[$field] = $val; 
                    }
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
            $options['offset'] = $offset;
        } 

        // ジョイン
        if (!empty($joins)) {
            $options['joins'] = $joins; 
        }

        // 結合レベル
        if (-1 <= $recursive) { 
            $options['recursive'] = $recursive;
        } 
        // SELECT実行
        $ret = $this->find($kind, $options);

        $data = array();
        if (!empty($ret)) {
            if ($kind == 'first') {
                $row = array();
                foreach ($ret as $model => $val) {
                    if (!isset($val[0])) {
                        $row = array_merge($row, $val);
                    } else {
                        $row[$model] = $val;
                    }
                }
                $data = $row;
            } else {
                foreach ($ret as $values) {
                    if (!is_array($values)) {
                        $data = $ret;
                        break;
                    }
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

        array_push($fields, 'created');

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

        // クエリ実行
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
      * デバッグ:実行されたクエリを出力
      */
    public function qlog() {

         $log = $this->getDataSource()->getLog(false, false);
         $num = $log['count'];
         for ($i = 0; $i < $num; $i++) {
             $querylog = $log['log'][$i ]['query'];
             $this->log($querylog);
         }
         return $querylog;
    }

    /**
     * 現在時刻の文字列を返す
     */
   protected function nowDate () {
       return date("Y-m-d H:i:s");
   }

}
