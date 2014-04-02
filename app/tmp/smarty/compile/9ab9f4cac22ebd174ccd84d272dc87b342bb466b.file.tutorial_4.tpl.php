<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:08:50
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158579797253295ea24731c9-90482536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ab9f4cac22ebd174ccd84d272dc87b342bb466b' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_4.tpl',
      1 => 1395219973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158579797253295ea24731c9-90482536',
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
  'unifunc' => 'content_53295ea24beb95_74625707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53295ea24beb95_74625707')) {function content_53295ea24beb95_74625707($_smarty_tpl) {?><div class="tutorials index">
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
