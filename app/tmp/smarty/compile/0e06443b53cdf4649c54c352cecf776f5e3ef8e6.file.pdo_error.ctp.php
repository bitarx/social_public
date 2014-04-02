<?php /* Smarty version Smarty-3.1.16, created on 2014-03-23 09:17:17
         compiled from "/var/www/asns/lib/Cake/View/Errors/pdo_error.ctp" */ ?>
<?php /*%%SmartyHeaderCode:16421534005325584d56d6f2-25013184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e06443b53cdf4649c54c352cecf776f5e3ef8e6' => 
    array (
      0 => '/var/www/asns/lib/Cake/View/Errors/pdo_error.ctp',
      1 => 1393665724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16421534005325584d56d6f2-25013184',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5325584d5b6021_58609940',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5325584d5b6021_58609940')) {function content_5325584d5b6021_58609940($_smarty_tpl) {?><<?php ?>?php
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
<h2><<?php ?>?php echo __d('cake_dev', 'Database Error'); ?<?php ?>></h2>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo $name; ?<?php ?>>
</p>
<<?php ?>?php if (!empty($error->queryString)) : ?<?php ?>>
	<p class="notice">
		<strong><<?php ?>?php echo __d('cake_dev', 'SQL Query'); ?<?php ?>>: </strong>
		<<?php ?>?php echo h($error->queryString); ?<?php ?>>
	</p>
<<?php ?>?php endif; ?<?php ?>>
<<?php ?>?php if (!empty($error->params)) : ?<?php ?>>
		<strong><<?php ?>?php echo __d('cake_dev', 'SQL Query Params'); ?<?php ?>>: </strong>
		<<?php ?>?php echo Debugger::dump($error->params); ?<?php ?>>
<<?php ?>?php endif; ?<?php ?>>
<p class="notice">
	<strong><<?php ?>?php echo __d('cake_dev', 'Notice'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'pdo_error.ctp'); ?<?php ?>>
</p>
<<?php ?>?php echo $this->element('exception_stack_trace'); ?<?php ?>>
<?php }} ?>
