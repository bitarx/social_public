<?php /* Smarty version Smarty-3.1.16, created on 2014-04-07 14:44:52
         compiled from "/var/www/asns/app/View/UserBaseCards/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:379006893533d643738bd99-04630235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b34c8b4e5bb32a1b1c335ec6076f54af801ec65' => 
    array (
      0 => '/var/www/asns/app/View/UserBaseCards/index.tpl',
      1 => 1396681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '379006893533d643738bd99-04630235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533d64373be219_24999738',
  'variables' => 
  array (
    'list' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d64373be219_24999738')) {function content_533d64373be219_24999738($_smarty_tpl) {?><div class="userBaseCards index">
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <a href="initBaseCard?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
            <div class="btnSelectCard">
                <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
                <div class="strSelectCard">
                    ベースに選択
                </div>
            </div>
        </a>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>
</div>
<?php }} ?>
