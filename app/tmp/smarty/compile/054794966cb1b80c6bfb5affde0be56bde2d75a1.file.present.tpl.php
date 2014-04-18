<?php /* Smarty version Smarty-3.1.16, created on 2014-04-18 15:57:30
         compiled from "/var/www/asns/app/View/Elements/present.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8222277505350b441cebe73-35758316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '054794966cb1b80c6bfb5affde0be56bde2d75a1' => 
    array (
      0 => '/var/www/asns/app/View/Elements/present.tpl',
      1 => 1397804215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8222277505350b441cebe73-35758316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5350b441d4b616_66161943',
  'variables' => 
  array (
    'data' => 0,
    'ctl' => 0,
    'addParam' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5350b441d4b616_66161943')) {function content_5350b441d4b616_66161943($_smarty_tpl) {?><div class="present">
    <div class="presentImg">
       <?php if (@constant('KIND_CARD')==$_smarty_tpl->tpl_vars['data']->value['kind']) {?>
           <img src="<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['data']->value['target'];?>
" width="100px">
       <?php } elseif (@constant('KIND_ITEM')==$_smarty_tpl->tpl_vars['data']->value['kind']) {?>
           <img src="<?php echo @constant('IMG_URL');?>
item/item_<?php echo $_smarty_tpl->tpl_vars['data']->value['target'];?>
.png" width="100px">
       <?php } elseif (@constant('KIND_GOLD')==$_smarty_tpl->tpl_vars['data']->value['kind']) {?>
           <img src="<?php echo @constant('IMG_URL');?>
item/gold.png" width="100px">

       <?php }?>
    </div>
    <div class="presentName">
            <span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

    </div>
    <div class="presentMes">
        <span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</span>
    </div>
    <div class="presentDate">
        入手日時:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['created'];?>
</span>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['ctl']->value=='UserPresentBoxes') {?>

        <a href="<?php echo @constant('BASE_URL');?>
UserPresentBoxes/init?user_present_box_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_present_box_id'];?>
<?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
">
            <div class="btnSelectPresent">
                <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
                <div class="strSelectPresent">
                   受け取る 
                </div>
            </div>
        </a>
    <?php }?>

</div>
<?php }} ?>
