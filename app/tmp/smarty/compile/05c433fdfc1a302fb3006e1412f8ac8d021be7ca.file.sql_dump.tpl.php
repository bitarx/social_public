<?php /* Smarty version Smarty-3.1.16, created on 2014-03-16 16:38:45
         compiled from "/var/www/asns/app/View/Elements/sql_dump.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19170166175325537f49dfe7-95906393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05c433fdfc1a302fb3006e1412f8ac8d021be7ca' => 
    array (
      0 => '/var/www/asns/app/View/Elements/sql_dump.tpl',
      1 => 1394955523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19170166175325537f49dfe7-95906393',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5325537f5462b2_85978763',
  'variables' => 
  array (
    'conf' => 0,
    'logs' => 0,
    'noLogs' => 0,
    'sources' => 0,
    'source' => 0,
    'db' => 0,
    '_forced_from_dbo_' => 0,
    'logInfo' => 0,
    't' => 0,
    'text' => 0,
    'k' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5325537f5462b2_85978763')) {function content_5325537f5462b2_85978763($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/asns/app/Vendor/smarty/plugins/modifier.regex_replace.php';
?><?php if (($_smarty_tpl->tpl_vars['conf']->value->debug<0)) {?>
	
<?php } else { ?>
bbbbbbbbbbbbbbbbbbbbbbb	
	<?php if (!isset($_smarty_tpl->tpl_vars['logs']->value)) {?>
		<?php $_smarty_tpl->tpl_vars['noLogs'] = new Smarty_variable(true, null, 0);?>
	<?php } else { ?>
		<?php $_smarty_tpl->tpl_vars['noLogs'] = new Smarty_variable(false, null, 0);?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['noLogs']->value) {?>
		<?php $_smarty_tpl->tpl_vars['sources'] = new Smarty_variable(ConnectionManager::sourceList(), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['logs'] = new Smarty_variable(array(), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['source']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sources']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['source']->key => $_smarty_tpl->tpl_vars['source']->value) {
$_smarty_tpl->tpl_vars['source']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['db'] = new Smarty_variable(ConnectionManager::getDataSource($_smarty_tpl->tpl_vars['source']->value), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['db']->value->isInterfaceSupported('getLog')) {?>
				<?php $_smarty_tpl->createLocalArrayVariable('logs', null, 0);
$_smarty_tpl->tpl_vars['logs']->value[$_smarty_tpl->tpl_vars['source']->value] = $_smarty_tpl->tpl_vars['db']->value->getLog();?>
			<?php }?>
		<?php } ?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['noLogs']->value||isset($_smarty_tpl->tpl_vars['_forced_from_dbo_']->value)) {?>
		<?php  $_smarty_tpl->tpl_vars['logInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['logInfo']->_loop = false;
 $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['logs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['logInfo']->key => $_smarty_tpl->tpl_vars['logInfo']->value) {
$_smarty_tpl->tpl_vars['logInfo']->_loop = true;
 $_smarty_tpl->tpl_vars['source']->value = $_smarty_tpl->tpl_vars['logInfo']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['logInfo']->value['count']>1) {?>
				<?php $_smarty_tpl->tpl_vars['text'] = new Smarty_variable('queries', null, 0);?>
			<?php } else { ?>
				<?php $_smarty_tpl->tpl_vars['text'] = new Smarty_variable('query', null, 0);?>
			<?php }?>
			
			<?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable(uniqid(time(),true), null, 0);?>
			<table class="cake-sql-log" id="cakeSqlLog_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['t']->value,'/[^A-Za-z0-9_]/','_');?>
" summary="Cake SQL Log" cellspacing="0" border = "0">
				<caption>(<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
) <?php echo $_smarty_tpl->tpl_vars['logInfo']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['text']->value;?>
 took <?php echo $_smarty_tpl->tpl_vars['logInfo']->value['time'];?>
 ms</caption>
			
				<thead>
					<tr><th>Nr</th><th>Query</th><th>Error</th><th>Affected</th><th>Num. rows</th><th>Took (ms)</th></tr>
				</thead>
				<tbody>

				<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['logInfo']->value['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
						<td><?php echo h($_smarty_tpl->tpl_vars['i']->value['query']);?>
</td>
						<td> <{ <?php echo $_smarty_tpl->tpl_vars['i']->value['error'];?>
 }> </td>
						<td style="text-align: right"> <{ <?php echo $_smarty_tpl->tpl_vars['i']->value['affected'];?>
 }> </td>
						<td style="text-align: right"> <{ <?php echo $_smarty_tpl->tpl_vars['i']->value['numRows'];?>
 }> </td>
						<td style="text-align: right"> <{ <?php echo $_smarty_tpl->tpl_vars['i']->value['took'];?>
 }> </td>
					</tr>
				<?php } ?>

				</tbody>
			</table>
		<?php } ?>
	<?php } else { ?>
		<p>Encountered unexpected <?php echo $_smarty_tpl->tpl_vars['logs']->value;?>
 cannot generate SQL log</p>
	<?php }?>
	
<?php }?>

<?php }} ?>
