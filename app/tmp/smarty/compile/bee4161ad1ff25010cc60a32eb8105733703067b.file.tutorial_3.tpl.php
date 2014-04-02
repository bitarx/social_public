<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:08:47
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141090201453295e9f05f129-26488915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee4161ad1ff25010cc60a32eb8105733703067b' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_3.tpl',
      1 => 1395219968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141090201453295e9f05f129-26488915',
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
  'unifunc' => 'content_53295e9f0a7885_86367804',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295e9f0a7885_86367804')) {function content_53295e9f0a7885_86367804($_smarty_tpl) {?><div class="tutorials index">
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
