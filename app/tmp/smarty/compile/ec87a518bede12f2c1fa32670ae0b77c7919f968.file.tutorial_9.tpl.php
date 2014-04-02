<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:46
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_9.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53939546753296006b5d309-98964118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec87a518bede12f2c1fa32670ae0b77c7919f968' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_9.tpl',
      1 => 1395220400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53939546753296006b5d309-98964118',
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
  'unifunc' => 'content_53296006ba4217_89634040',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296006ba4217_89634040')) {function content_53296006ba4217_89634040($_smarty_tpl) {?><div class="tutorials index">
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
