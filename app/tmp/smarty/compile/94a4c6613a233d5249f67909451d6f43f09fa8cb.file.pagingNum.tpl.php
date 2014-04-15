<?php /* Smarty version Smarty-3.1.16, created on 2014-04-15 17:18:16
         compiled from "/var/www/asns/app/View/Elements/pagingNum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8207731653490bd069c293-35789546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94a4c6613a233d5249f67909451d6f43f09fa8cb' => 
    array (
      0 => '/var/www/asns/app/View/Elements/pagingNum.tpl',
      1 => 1397549832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8207731653490bd069c293-35789546',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53490bd06d9ee2_07526181',
  'variables' => 
  array (
    'pageAll' => 0,
    'page' => 0,
    'ctlAction' => 0,
    'kind' => 0,
    'rareLevelSelect' => 0,
    'sortItemSelect' => 0,
    'addParam' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53490bd06d9ee2_07526181')) {function content_53490bd06d9ee2_07526181($_smarty_tpl) {?><div class="pagingNum">

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['name'] = 'pageNum';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pageAll']->value+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pageNum']['total']);
?>
        <div class="btnPagingNum">
          <?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->getVariable('smarty')->value['section']['pageNum']['index']) {?>
            <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_off.png" height="30px">

            <div class="strPagingNum">
            <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pageNum']['index'];?>
&nbsp;
          <?php } else { ?>
            <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_on.png" height="30px">
            <div class="strPagingNum">
            <a href="<?php echo @constant('BASE_URL');?>
<?php echo $_smarty_tpl->tpl_vars['ctlAction']->value;?>
?<?php echo @constant('KEY_PAGING');?>
=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pageNum']['index'];?>
&kind=<?php echo $_smarty_tpl->tpl_vars['kind']->value;?>
&rare_level=<?php echo $_smarty_tpl->tpl_vars['rareLevelSelect']->value;?>
&sort_item=<?php echo $_smarty_tpl->tpl_vars['sortItemSelect']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['addParam']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pageNum']['index'];?>
</a>&nbsp;
          <?php }?>
          </div>
        </div>
        <?php endfor; endif; ?>

</div>
<?php }} ?>
