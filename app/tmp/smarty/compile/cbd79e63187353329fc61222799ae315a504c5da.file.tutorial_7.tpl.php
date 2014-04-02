<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:42
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_7.tpl" */ ?>
<?php /*%%SmartyHeaderCode:363577905532960020f62f2-63952427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbd79e63187353329fc61222799ae315a504c5da' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_7.tpl',
      1 => 1395220374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '363577905532960020f62f2-63952427',
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
  'unifunc' => 'content_53296002136d26_34878769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296002136d26_34878769')) {function content_53296002136d26_34878769($_smarty_tpl) {?><div class="tutorials index">
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
