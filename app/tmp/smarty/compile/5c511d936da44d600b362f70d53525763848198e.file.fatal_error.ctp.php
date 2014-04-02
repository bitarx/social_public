<?php /* Smarty version Smarty-3.1.16, created on 2014-03-23 09:37:05
         compiled from "/var/www/asns/lib/Cake/View/Errors/fatal_error.ctp" */ ?>
<?php /*%%SmartyHeaderCode:126002331532557c7d19842-51782277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c511d936da44d600b362f70d53525763848198e' => 
    array (
      0 => '/var/www/asns/lib/Cake/View/Errors/fatal_error.ctp',
      1 => 1393665724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126002331532557c7d19842-51782277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532557c7d5bad7_10496608',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532557c7d5bad7_10496608')) {function content_532557c7d5bad7_10496608($_smarty_tpl) {?><<?php ?>?php
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
 * @since         CakePHP(tm) v 2.2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?<?php ?>>
<h2><<?php ?>?php echo __d('cake_dev', 'Fatal Error'); ?<?php ?>></h2>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo h($error->getMessage()); ?<?php ?>>
	<br>

	<strong><<?php ?>?php echo __d('cake_dev', 'File'); ?<?php ?>>: </strong>
	<<?php ?>?php echo h($error->getFile()); ?<?php ?>>
	<br>

	<strong><<?php ?>?php echo __d('cake_dev', 'Line'); ?<?php ?>>: </strong>
	<<?php ?>?php echo h($error->getLine()); ?<?php ?>>
</p>
<p class="notice">
	<strong><<?php ?>?php echo __d('cake_dev', 'Notice'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'fatal_error.ctp'); ?<?php ?>>
</p>
<?php }} ?>
