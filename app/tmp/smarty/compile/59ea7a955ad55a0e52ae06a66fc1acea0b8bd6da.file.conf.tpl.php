<?php /* Smarty version Smarty-3.1.16, created on 2014-04-05 18:41:15
         compiled from "/var/www/asns/app/View/UserCards/conf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326081342533fafdbbcb267-98938198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59ea7a955ad55a0e52ae06a66fc1acea0b8bd6da' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/conf.tpl',
      1 => 1396690866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326081342533fafdbbcb267-98938198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533fafdbc27542_01089328',
  'variables' => 
  array (
    'list' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533fafdbc27542_01089328')) {function content_533fafdbc27542_01089328($_smarty_tpl) {?><div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <a href="<?php echo @constant('BASE_URL');?>
UserCards/actUp?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
        <div class="btnSelectSt">
            <img src="<?php echo @constant('IMG_URL');?>
btn_st_l.png">
            <div class="strSelectStComp">
                合成する
            </div>
        </div>
    </a>

</div>
<?php }} ?>
