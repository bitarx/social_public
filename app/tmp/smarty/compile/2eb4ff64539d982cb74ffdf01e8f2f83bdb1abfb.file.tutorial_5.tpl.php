<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:11:17
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_5.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130218279853295f35d8abf8-05892612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2eb4ff64539d982cb74ffdf01e8f2f83bdb1abfb' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_5.tpl',
      1 => 1395220272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130218279853295f35d8abf8-05892612',
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
  'unifunc' => 'content_53295f35dd34f5_85223255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295f35dd34f5_85223255')) {function content_53295f35dd34f5_85223255($_smarty_tpl) {?><div class="tutorials index">
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
