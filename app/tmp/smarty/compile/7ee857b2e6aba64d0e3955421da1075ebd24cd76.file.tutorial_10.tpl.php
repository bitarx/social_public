<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:48
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_10.tpl" */ ?>
<?php /*%%SmartyHeaderCode:798893553296008d30973-43628905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ee857b2e6aba64d0e3955421da1075ebd24cd76' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_10.tpl',
      1 => 1395220417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '798893553296008d30973-43628905',
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
  'unifunc' => 'content_53296008d7c849_33962622',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296008d7c849_33962622')) {function content_53296008d7c849_33962622($_smarty_tpl) {?><div class="tutorials index">
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
