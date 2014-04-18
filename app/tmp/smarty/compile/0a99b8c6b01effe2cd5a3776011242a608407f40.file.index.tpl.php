<?php /* Smarty version Smarty-3.1.16, created on 2014-04-18 15:58:23
         compiled from "/var/www/asns/app/View/UserPresentBoxes/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:962527377534e2ef64866e1-36755913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a99b8c6b01effe2cd5a3776011242a608407f40' => 
    array (
      0 => '/var/www/asns/app/View/UserPresentBoxes/index.tpl',
      1 => 1397804301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '962527377534e2ef64866e1-36755913',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534e2ef64b3bf2_52133947',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534e2ef64b3bf2_52133947')) {function content_534e2ef64b3bf2_52133947($_smarty_tpl) {?><div class="userPresentBoxesIndex">
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="btnGetPresentAll">
      <?php if (!empty($_smarty_tpl->tpl_vars['list']->value)) {?> 
       <a href="<?php echo @constant('BASE_URL');?>
UserPresentBoxes/initAll">
       <img src="<?php echo @constant('IMG_URL');?>
btn_st_l.png">
        <div class="strGetPresentAll">
            一括受け取り
        </div>
        </a>
      <?php } else { ?>
        受け取れるプレゼントがありません。
      <?php }?>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
      <div class="listBlock">
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/present.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
