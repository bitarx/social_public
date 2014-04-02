<?php /* Smarty version Smarty-3.1.16, created on 2014-03-16 16:24:32
         compiled from "/var/www/asns/app/View/Errors/error500.ctp" */ ?>
<?php /*%%SmartyHeaderCode:479373373532551b0af7e61-60346602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bd4772b8f3736071b39fc0e3270c37c1cdc13ee' => 
    array (
      0 => '/var/www/asns/app/View/Errors/error500.ctp',
      1 => 1391647888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '479373373532551b0af7e61-60346602',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532551b0b00ce7_38756373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532551b0b00ce7_38756373')) {function content_532551b0b00ce7_38756373($_smarty_tpl) {?><<?php ?>?php
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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?<?php ?>>
<h2><<?php ?>?php echo $name; ?<?php ?>></h2>
<p class="error">
	<strong><<?php ?>?php echo __d('cake', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake', 'An Internal Error Has Occurred.'); ?<?php ?>>
</p>
<<?php ?>?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?<?php ?>>
<?php }} ?>
