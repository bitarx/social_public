<?php /* Smarty version Smarty-3.1.16, created on 2014-04-14 14:23:27
         compiled from "/var/www/asns/app/View/UserDecks/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:762667577534b59fe849df5-80445521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e385297a62da2cad4e03ddf66ecaf19bad894b' => 
    array (
      0 => '/var/www/asns/app/View/UserDecks/index.tpl',
      1 => 1397452693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '762667577534b59fe849df5-80445521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534b59fe87d139_06556759',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534b59fe87d139_06556759')) {function content_534b59fe87d139_06556759($_smarty_tpl) {?><div>
    <div class="changeBase">
        <img src="<?php echo @constant('IMG_URL');?>
btn_st_l.png">
        <a href="<?php echo @constant('BASE_URL');?>
UserBaseCards/index">
        <div class="strChangeBase" >
           デッキ自動編成 
        </div>
        </a>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
      <div class="listBlock">
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>
</div>
<?php }} ?>
