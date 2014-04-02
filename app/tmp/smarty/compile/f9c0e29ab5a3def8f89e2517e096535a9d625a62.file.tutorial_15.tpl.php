<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:59
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_15.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199791457953296013d3e7b8-70747892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9c0e29ab5a3def8f89e2517e096535a9d625a62' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_15.tpl',
      1 => 1395220435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199791457953296013d3e7b8-70747892',
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
  'unifunc' => 'content_53296013d8b077_16631171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296013d8b077_16631171')) {function content_53296013d8b077_16631171($_smarty_tpl) {?><div class="tutorials index">
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
