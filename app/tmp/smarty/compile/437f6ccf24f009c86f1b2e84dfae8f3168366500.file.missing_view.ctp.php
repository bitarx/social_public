<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:08:52
         compiled from "/var/www/asns/lib/Cake/View/Errors/missing_view.ctp" */ ?>
<?php /*%%SmartyHeaderCode:194108526653295ea4eec425-95972567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '437f6ccf24f009c86f1b2e84dfae8f3168366500' => 
    array (
      0 => '/var/www/asns/lib/Cake/View/Errors/missing_view.ctp',
      1 => 1391647889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194108526653295ea4eec425-95972567',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53295ea4f3c8a3_69274847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295ea4f3c8a3_69274847')) {function content_53295ea4f3c8a3_69274847($_smarty_tpl) {?><<?php ?>?php
/**
 *
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
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?<?php ?>>
<h2><<?php ?>?php echo __d('cake_dev', 'Missing View'); ?<?php ?>></h2>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'The view for %1$s%2$s was not found.', '<em>' . h(Inflector::camelize($this->request->controller)) . 'Controller::</em>', '<em>' . h($this->request->action) . '()</em>'); ?<?php ?>>
</p>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'Confirm you have created the file: %s', h($file)); ?<?php ?>>
</p>
<p class="notice">
	<strong><<?php ?>?php echo __d('cake_dev', 'Notice'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_view.ctp'); ?<?php ?>>
</p>

<<?php ?>?php echo $this->element('exception_stack_trace'); ?<?php ?>>
<?php }} ?>
