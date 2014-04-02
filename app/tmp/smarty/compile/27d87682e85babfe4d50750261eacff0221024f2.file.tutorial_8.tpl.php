<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:44
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_8.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180962296353296004bfd1d7-83742378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27d87682e85babfe4d50750261eacff0221024f2' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_8.tpl',
      1 => 1395220388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180962296353296004bfd1d7-83742378',
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
  'unifunc' => 'content_53296004c43eb4_21747015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296004c43eb4_21747015')) {function content_53296004c43eb4_21747015($_smarty_tpl) {?><div class="tutorials index">
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
