<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:38
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_6.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105447710853295ffe81c557-36163455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9df64a33b1bf78c86643df13b7730f58660e49a5' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_6.tpl',
      1 => 1395220366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105447710853295ffe81c557-36163455',
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
  'unifunc' => 'content_53295ffe861572_51770867',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295ffe861572_51770867')) {function content_53295ffe861572_51770867($_smarty_tpl) {?><div class="tutorials index">
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
