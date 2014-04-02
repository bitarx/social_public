<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:57
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_14.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2088516348532960118f0ca0-22668914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a57770aa5cad3593636fde7117ca770e14f95c7' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_14.tpl',
      1 => 1395220433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2088516348532960118f0ca0-22668914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53296011937163_89819416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296011937163_89819416')) {function content_53296011937163_89819416($_smarty_tpl) {?><div class="tutorials index">
	<h2>Tutorials</h2>
    <?php echo $_smarty_tpl->tpl_vars['row']->value['tutorial_title'];?>
<br />
    <?php echo $_smarty_tpl->tpl_vars['row']->value['tutorial_words'];?>
<br />
    <?php echo $_smarty_tpl->tpl_vars['row']->value['tutorial_words2'];?>
<br />
    <?php echo $_smarty_tpl->tpl_vars['row']->value['tutorial_words3'];?>
<br />
    <a href="<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
">next</a>
</div>
<?php }} ?>
