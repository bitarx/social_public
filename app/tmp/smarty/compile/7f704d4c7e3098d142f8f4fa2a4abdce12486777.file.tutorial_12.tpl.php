<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:14:53
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_12.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12766447955329600db9da59-42626039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f704d4c7e3098d142f8f4fa2a4abdce12486777' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_12.tpl',
      1 => 1395220427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12766447955329600db9da59-42626039',
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
  'unifunc' => 'content_5329600dbdea74_97490470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329600dbdea74_97490470')) {function content_5329600dbdea74_97490470($_smarty_tpl) {?><div class="tutorials index">
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
