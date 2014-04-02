<?php /* Smarty version Smarty-3.1.16, created on 2014-03-24 12:29:21
         compiled from "/var/www/asns/app/View/Stages/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135726261532e4521320dd9-22368068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e2312bfb9a96edd859ee66dde2cf6b4f650a444' => 
    array (
      0 => '/var/www/asns/app/View/Stages/index.tpl',
      1 => 1395631502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135726261532e4521320dd9-22368068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532e4521353da9_00426241',
  'variables' => 
  array (
    'list' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e4521353da9_00426241')) {function content_532e4521353da9_00426241($_smarty_tpl) {?><div class="stages index">
	<h2>Stages</h2>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['list']->value[0]['quest_detail'];?>
 
    </div>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        <div>
            <a href="initStage?stage_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['stage_id'];?>
 "><?php echo $_smarty_tpl->tpl_vars['val']->value['stage_id'];?>
. <?php echo $_smarty_tpl->tpl_vars['val']->value['stage_title'];?>
 </a>
        </div>
    <?php } ?>
</div>
<?php }} ?>
