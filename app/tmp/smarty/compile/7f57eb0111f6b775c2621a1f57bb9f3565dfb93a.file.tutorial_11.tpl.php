<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:51
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_11.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13889805915329600b769906-41415446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f57eb0111f6b775c2621a1f57bb9f3565dfb93a' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_11.tpl',
      1 => 1395220424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13889805915329600b769906-41415446',
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
  'unifunc' => 'content_5329600b7b9297_43422090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329600b7b9297_43422090')) {function content_5329600b7b9297_43422090($_smarty_tpl) {?><div class="tutorials index">
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
