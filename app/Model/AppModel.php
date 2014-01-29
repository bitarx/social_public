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
     * 返却はJson形式
     *
     * @author imanishi
     * @return void
     */
    public function beforeFilter() {
        $this->viewClass = 'Json';
    }

    /**
     * 条件検索
     *
     * @author imanishi 
     * @param array $where  検索条件
     * @param array $fields 取得カラム
     * @return array 検索結果
     */
    public function getAllFind( $where = array(), $fields = array() ) {
        $options = array();
        $conditions = array($this->getTableAlias(). '.'. $this->_filDelFlg => 0);
        if (0 < count($where)) {
            foreach ($where as $field => $val) {
                $conditions[$this->getTableAlias(). '.'. $field] = $val; 
            }
        }
        if (0 < count($fields)) {
            $options['fields'] = $fields;
        }

        $options['conditions'] = $conditions;

        return $this->find('all', $options);
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
}
