<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:55
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_13.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17165568585329600f757d80-37645097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cff63488e190ab544fa1832638196f8a08d8271b' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_13.tpl',
      1 => 1395220430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17165568585329600f757d80-37645097',
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
  'unifunc' => 'content_5329600f79e841_12965972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329600f79e841_12965972')) {function content_5329600f79e841_12965972($_smarty_tpl) {?><div class="tutorials index">
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
