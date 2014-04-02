<?php /* Smarty version Smarty-3.1.16, created on 2014-03-16 17:32:31
         compiled from "/var/www/asns/lib/Cake/View/Errors/missing_action.ctp" */ ?>
<?php /*%%SmartyHeaderCode:6686223005325619fbd9e29-45191020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd299c2d9de07ac8cf61d4bc560508f4787a0a8ee' => 
    array (
      0 => '/var/www/asns/lib/Cake/View/Errors/missing_action.ctp',
      1 => 1391647889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6686223005325619fbd9e29-45191020',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5325619fc31696_89526189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5325619fc31696_89526189')) {function content_5325619fc31696_89526189($_smarty_tpl) {?><<?php ?>?php
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
<h2><<?php ?>?php echo __d('cake_dev', 'Missing Method in %s', h($controller)); ?<?php ?>></h2> <p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'The action %1$s is not defined in controller %2$s', '<em>' . h($action) . '</em>', '<em>' . h($controller) . '</em>'); ?<?php ?>>
</p>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'Create %1$s%2$s in file: %3$s.', '<em>' . h($controller) . '::</em>', '<em>' . h($action) . '()</em>', APP_DIR . DS . 'Controller' . DS . h($controller) . '.php'); ?<?php ?>>
</p>
<pre>
&lt;?php
class <<?php ?>?php echo h($controller); ?<?php ?>> extends AppController {

<strong>
	public function <<?php ?>?php echo h($action); ?<?php ?>>() {

	}
</strong>
}
</pre>
<p class="notice">
	<strong><<?php ?>?php echo __d('cake_dev', 'Notice'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_action.ctp'); ?<?php ?>>
</p>
<<?php ?>?php echo $this->element('exception_stack_trace'); ?<?php ?>>
<?php }} ?>
