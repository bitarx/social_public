<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 15:22:24
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134051936853294af02f6ce1-87101366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6321a62d01a0bdebb73f13dbc101212884c7214' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_1.tpl',
      1 => 1395256691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134051936853294af02f6ce1-87101366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53294af032a4e7_38226981',
  'variables' => 
  array (
    'row' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53294af032a4e7_38226981')) {function content_53294af032a4e7_38226981($_smarty_tpl) {?><div class="tutorials index">
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
