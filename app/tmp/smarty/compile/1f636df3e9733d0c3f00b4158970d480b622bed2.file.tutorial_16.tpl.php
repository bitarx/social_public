<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 18:15:02
         compiled from "/var/www/asns/app/View/Tutorials/tutorial_16.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1003279499532960161fe655-02094132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f636df3e9733d0c3f00b4158970d480b622bed2' => 
    array (
      0 => '/var/www/asns/app/View/Tutorials/tutorial_16.tpl',
      1 => 1395220439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1003279499532960161fe655-02094132',
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
  'unifunc' => 'content_53296016245d44_82928422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53296016245d44_82928422')) {function content_53296016245d44_82928422($_smarty_tpl) {?><div class="tutorials index">
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
