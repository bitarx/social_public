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

        $fields = array('id');
        $where  = array();
        $this-><?php echo $currentModelName; ?>->getAllFind($where, $fields);
        $this->set('<?php echo $pluralName ?>', $this->Paginator->paginate());

        $this-><?php echo $currentModelName; ?>->begin();
        try {
            $values = array(
                'user_id'     => $userId
            );
            $ret = $this-><?php echo $currentModelName; ?>->save($values);
            if (!$ret) {
                throw new AppException('<?php echo $currentModelName; ?> save failed :' . $this->name . '/' . $this->action);
            }

        } catch (AppException $e) {

            $this-><?php echo $currentModelName; ?>->rollback();

            $this->log($e->errmes);
            return $this->redirect(
                       array('controller' => 'errors', 'action' => 'index'
                             , '?' => array('error' => 2)
                   ));
        }
        $this-><?php echo $currentModelName; ?>->commit();
	}

    /**
     * <?php echo $admin ?>条件検索(変更禁止)
     *
     * @author imanishi 
     * @return json 検索結果一覧
     */
    public function find() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

            $fields = func_get_args();
            $list = $this-><?php echo $currentModelName; ?>->getAllFind($this->request->query, $fields);
            $this->setJson($list);
        }
    }

    /**
     * <?php echo $admin ?>登録更新(変更禁止)
     *
     * @author imanishi 
     * @return json 0:失敗 1:成功 2:put以外のリクエスト
     */
	public function <?php echo $admin ?>init() {

        if ($this->request->is(array('ajax'))) {

            $this->autoRender = false;   // 自動描画をさせない

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

