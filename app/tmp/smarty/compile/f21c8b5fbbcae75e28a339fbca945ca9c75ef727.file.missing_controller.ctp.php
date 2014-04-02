<?php /* Smarty version Smarty-3.1.16, created on 2014-03-22 12:56:26
         compiled from "/var/www/asns/lib/Cake/View/Errors/missing_controller.ctp" */ ?>
<?php /*%%SmartyHeaderCode:35868059153252929d75e16-97299153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f21c8b5fbbcae75e28a339fbca945ca9c75ef727' => 
    array (
      0 => '/var/www/asns/lib/Cake/View/Errors/missing_controller.ctp',
      1 => 1393665724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35868059153252929d75e16-97299153',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53252929db6754_40803648',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53252929db6754_40803648')) {function content_53252929db6754_40803648($_smarty_tpl) {?><<?php ?>?php
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

$pluginDot = empty($plugin) ? null : $plugin . '.';
?<?php ?>>
<h2><<?php ?>?php echo __d('cake_dev', 'Missing Controller'); ?<?php ?>></h2>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', '%s could not be found.', '<em>' . h($pluginDot . $class) . '</em>'); ?<?php ?>>
</p>
<p class="error">
	<strong><<?php ?>?php echo __d('cake_dev', 'Error'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'Create the class %s below in file: %s', '<em>' . h($class) . '</em>', (empty($plugin) ? APP_DIR . DS : CakePlugin::path($plugin)) . 'Controller' . DS . h($class) . '.php'); ?<?php ?>>
</p>
<pre>
&lt;?php
class <<?php ?>?php echo h($class . ' extends ' . $plugin); ?<?php ?>>AppController {

}
</pre>
<p class="notice">
	<strong><<?php ?>?php echo __d('cake_dev', 'Notice'); ?<?php ?>>: </strong>
	<<?php ?>?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_controller.ctp'); ?<?php ?>>
</p>

<<?php ?>?php echo $this->element('exception_stack_trace'); ?<?php ?>>
<?php }} ?>
