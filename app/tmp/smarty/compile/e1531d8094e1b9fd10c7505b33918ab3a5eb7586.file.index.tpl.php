<?php /* Smarty version Smarty-3.1.16, created on 2014-04-16 13:49:45
         compiled from "/var/www/asns/app/View/Users/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:878641735534dc9e40e5f13-68147983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1531d8094e1b9fd10c7505b33918ab3a5eb7586' => 
    array (
      0 => '/var/www/asns/app/View/Users/index.tpl',
      1 => 1397623714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '878641735534dc9e40e5f13-68147983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534dc9e4146d92_08027411',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534dc9e4146d92_08027411')) {function content_534dc9e4146d92_08027411($_smarty_tpl) {?><div class="mypage">
    <div class="deckCard1">
       <?php if (!empty($_smarty_tpl->tpl_vars['list']->value[0]['card_id'])) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=s&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['card_id'];?>
" width="128px" height="360px">
       <?php } else { ?>
           <img src="<?php echo @constant('IMG_URL');?>
noset.jpg" width="128px" height="360px">
       <?php }?>
    </div>
    <div class="deckCard2">
       <?php if (!empty($_smarty_tpl->tpl_vars['list']->value[1]['card_id'])) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=s&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['list']->value[1]['card_id'];?>
" width="128px" height="360px">
       <?php } else { ?>
           <img src="<?php echo @constant('IMG_URL');?>
noset.jpg" width="128px" height="360px">
       <?php }?>
    </div>
    <div class="deckCard3">
       <?php if (!empty($_smarty_tpl->tpl_vars['list']->value[2]['card_id'])) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=s&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['list']->value[2]['card_id'];?>
" width="128px" height="360px">
       <?php } else { ?>
           <img src="<?php echo @constant('IMG_URL');?>
noset.jpg" width="128px" height="360px">
       <?php }?>
    </div>
    <div class="deckCard4">
       <?php if (!empty($_smarty_tpl->tpl_vars['list']->value[3]['card_id'])) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=s&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['list']->value[3]['card_id'];?>
" width="128px" height="360px">
       <?php } else { ?>
           <img src="<?php echo @constant('IMG_URL');?>
noset.jpg" width="128px" height="360px">
       <?php }?>
    </div>
    <div class="deckCard5">
       <?php if (!empty($_smarty_tpl->tpl_vars['list']->value[4]['card_id'])) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=s&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['list']->value[4]['card_id'];?>
" width="128px" height="360px">
       <?php } else { ?>
           <img src="<?php echo @constant('IMG_URL');?>
noset.jpg" width="128px" height="360px">
       <?php }?>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
