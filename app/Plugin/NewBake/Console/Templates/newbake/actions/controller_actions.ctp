<?php
/**
 * Bake Template for Controller action generation.
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
 * @package       Cake.Console.Templates.default.actions
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
    /**
     * <?php echo $admin ?>index method
     *
     * @author imanishi 
     * @return json
     */
	public function <?php echo $admin ?>index() {

        $fields = func_get_args();
        $list = $this-><?php echo $currentModelName; ?>->getAllFind($this->request->query, $fields);
        $this->setJson($list);
	}

    /**
     * <?php echo $admin ?>条件検索
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        $fields = func_get_args();
        $list = $this-><?php echo $currentModelName; ?>->getAllFind($this->request->query, $fields);
        $this->setJson($list);
    }

    /**
     * <?php echo $admin ?>登録更新
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:post以外のリクエスト
     */
	public function <?php echo $admin ?>init() {

        if ($this->request->is(array('put'))) {
            if ($this-><?php echo $currentModelName; ?>->save($this->request->query)) {
                $ary = array('result' => 1);
            } else {
                $ary = array('result' => 0);
            }
        } else {
            $ary = array('result' => 2);
        }

        $this->setJson($ary);
	}

