<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:02:09
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77888667653295cde844686-27802817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa0855bcad9c2cf5d33a310a5752b72b7580bd2b' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_2.tpl',
      1 => 1395219708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77888667653295cde844686-27802817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53295cde88bc16_92384239',
  'variables' => 
  array (
    'row' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295cde88bc16_92384239')) {function content_53295cde88bc16_92384239($_smarty_tpl) {?><div class="tutorials index">
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
