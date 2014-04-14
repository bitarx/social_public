<?php /* Smarty version Smarty-3.1.16, created on 2014-04-14 14:09:33
         compiled from "/var/www/asns/app/View/Elements/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1351165049532595aa144a53-12900819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bb084760daefd2bdeb476680418a23ef7c2289f' => 
    array (
      0 => '/var/www/asns/app/View/Elements/menu.tpl',
      1 => 1397452013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351165049532595aa144a53-12900819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532595aa145d62_03088972',
  'variables' => 
  array (
    'linkSnsUser' => 0,
    'linkUser' => 0,
    'linkQuest' => 0,
    'linkUserCard' => 0,
    'linkDeck' => 0,
    'linkGacha' => 0,
    'linkPbox' => 0,
    'linkUserItem' => 0,
    'linkItem' => 0,
    'linkUserStage' => 0,
    'linkStaticPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532595aa145d62_03088972')) {function content_532595aa145d62_03088972($_smarty_tpl) {?><div id="div_menu">
    <div class="menu_base">
        <img src="<?php echo @constant('BASE_URL');?>
img/menu_base.png"> 
    </div>
    <div class="menu_head">
        <div class="head_child">
            <img src="<?php echo @constant('BASE_URL');?>
img/menu_head.png"> 
        </div>
        <div class="menu_close">
            <img src="<?php echo @constant('BASE_URL');?>
img/clear.png"> 
        </div>
        <div class="icon_top">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkSnsUser']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_top.png" ></a> 
        </div>
        <div class="icon_mypage">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkUser']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_mypage.png" ></a>
        </div>
        <div class="icon_quest">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkQuest']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_quest.png" ></a>
        </div>

        <div class="icon_synth">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkUserCard']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_synth.png" ></a> 
        </div>
        <div class="icon_deck">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkDeck']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_deck.png" ></a>
        </div>
        <div class="icon_gacha">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkGacha']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_gacha.png" ></a>
        </div>

        <div class="icon_pbox">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkPbox']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_pbox.png" ></a> 
        </div>
        <div class="icon_item">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkUserItem']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_item.png" ></a>
        </div>
        <div class="icon_shop">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkItem']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_shop.png" ></a>
        </div>

        <div class="icon_scene">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkUserStage']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_scene.png" ></a>
        </div>
        <div class="icon_help">
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkStaticPage']->value;?>
 "><img src="<?php echo @constant('BASE_URL');?>
img/icon_help.png" ></a>
        </div>

    </div>
</div>
<?php }} ?>
