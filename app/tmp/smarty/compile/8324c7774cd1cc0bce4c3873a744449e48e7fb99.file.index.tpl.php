<?php /* Smarty version Smarty-3.1.16, created on 2014-03-24 10:17:12
         compiled from "/var/www/asns/app/View/Quests/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1453400311532e2f1147d941-77504734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8324c7774cd1cc0bce4c3873a744449e48e7fb99' => 
    array (
      0 => '/var/www/asns/app/View/Quests/index.tpl',
      1 => 1395621856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1453400311532e2f1147d941-77504734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532e2f114bde50_68423203',
  'variables' => 
  array (
    'list' => 0,
    'linkStage' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e2f114bde50_68423203')) {function content_532e2f114bde50_68423203($_smarty_tpl) {?><div class="quests index">
	<h2>Quests</h2>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?> 
        <div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['linkStage']->value;?>
?quest_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['quest_id'];?>
 "><?php echo $_smarty_tpl->tpl_vars['val']->value['quest_id'];?>
. <?php echo $_smarty_tpl->tpl_vars['val']->value['quest_title'];?>
 <br /><?php echo $_smarty_tpl->tpl_vars['val']->value['detail_before1'];?>
 </a>
        </div>
    <?php } ?> 
</div>
<?php }} ?>
