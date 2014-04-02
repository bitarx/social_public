<?php /* Smarty version Smarty-3.1.16, created on 2014-03-16 15:49:14
         compiled from "/var/www/asns/app/View/Layouts/default.ctp" */ ?>
<?php /*%%SmartyHeaderCode:18580454765325496a292df8-60113921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93dce422c1fe1eac8d5bed45ccbd26e401b31aab' => 
    array (
      0 => '/var/www/asns/app/View/Layouts/default.ctp',
      1 => 1394933608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18580454765325496a292df8-60113921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5325496a2e2f51_89766473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5325496a2e2f51_89766473')) {function content_5325496a2e2f51_89766473($_smarty_tpl) {?><<?php ?>?php
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?<?php ?>>
<!DOCTYPE html>
<html>
<head>
	<<?php ?>?php echo $this->Html->charset(); ?<?php ?>>
	<title>
		<<?php ?>?php echo $cakeDescription ?<?php ?>>:
		<<?php ?>?php echo $title_for_layout; ?<?php ?>>
	</title>
	<<?php ?>?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('main');
        echo $this->Html->script( 'jquery-2.1.0.min.js', array( 'inline' => false ) );
        echo $this->Html->script('jquery.leanModal.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?<?php ?>>
</head>
<body>
	<div id="container">
		<div class="header">
		    <<?php ?>?=	$this->Html->image('header_base.png', array('alt' => $cakeDescription, 'border' => '0', 'width' => '663px')); ?<?php ?>>
		</div>
		<div class="btn_my">
		    <<?php ?>?= $this->Html->link(	
                    $this->Html->image('btn_my_on.png', array('alt' => $cakeDescription, 'border' => '0')) 
                ,   array('controller' => 'Users' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?<?php ?>>
		    <<?php ?>?= $this->Html->link(	
                    $this->Html->image('btn_synth_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'UserCards' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?<?php ?>>
		    <<?php ?>?= $this->Html->link(	
                    $this->Html->image('btn_quest_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'Quests' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?<?php ?>>
		    <<?php ?>?= $this->Html->link(	
                    $this->Html->image('btn_gacha_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'Gachas' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?<?php ?>>

		    <<?php ?>?=	$this->Html->image('btn_menu_on.png', array('alt' => $cakeDescription, 'border' => '0')); ?<?php ?>>
		</div>
		<div id="content">


            <a rel="leanModal" href="#div787">Edit</a>
            <div id="div787"><<モーダルウィンドウ内に表示する要素>></div>

            <script type="text/javascript">
            $(function() {
                $( 'a[rel*=leanModal]').leanModal({
                    top: 50,                     // モーダルウィンドウの縦位置を指定
                    overlay : 0.5,               // 背面の透明度 
                    closeButton: ".modal_close"  // 閉じるボタンのCSS classを指定
                });
            }); 
            </script>

			<<?php ?>?php echo $this->Session->flash(); ?<?php ?>>

			<<?php ?>?php echo $this->fetch('content'); ?<?php ?>>
		</div>
		<div id="footer">
			<<?php ?>?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?<?php ?>>
		</div>
	</div>
	<<?php ?>?php echo $this->element('sql_dump'); ?<?php ?>>
</body>
</html>
<?php }} ?>
