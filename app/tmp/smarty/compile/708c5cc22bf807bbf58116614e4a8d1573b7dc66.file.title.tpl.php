<?php /* Smarty version Smarty-3.1.16, created on 2014-04-17 09:30:23
         compiled from "/var/www/asns/app/View/Elements/title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135247226533e309e3a1af1-37746390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '708c5cc22bf807bbf58116614e4a8d1573b7dc66' => 
    array (
      0 => '/var/www/asns/app/View/Elements/title.tpl',
      1 => 1397694618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135247226533e309e3a1af1-37746390',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533e309e3a9874_12132868',
  'variables' => 
  array (
    'ctl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533e309e3a9874_12132868')) {function content_533e309e3a9874_12132868($_smarty_tpl) {?><div class="bannerTitle">
    <img src="<?php echo @constant('IMG_URL');?>
banner_title.png">
    <?php if ('UserCards'==$_smarty_tpl->tpl_vars['ctl']->value) {?> 
        <div class="strTitleSynth" >
            強化進化
        </div>
    <?php } elseif ('UserBaseCards'==$_smarty_tpl->tpl_vars['ctl']->value) {?> 
        <div class="strTitleBaseCard" >
            ベースカード変更
        </div>
    <?php } elseif ('UserDeckCards'==$_smarty_tpl->tpl_vars['ctl']->value) {?> 
        <div class="strTitleDeckCard" >
            デッキ編成
        </div>
    <?php } elseif ('UserPresentBoxes'==$_smarty_tpl->tpl_vars['ctl']->value) {?> 
        <div class="strTitleDeckCard" >
           受取BOX 
        </div>
    <?php }?>
</div>
<?php }} ?>
