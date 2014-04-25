<?php /* Smarty version Smarty-3.1.16, created on 2014-04-25 12:39:46
         compiled from "/var/www/asns/app/View/UserDeckCards/init_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:556069463534cc50de72943-81498282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b235eab7ad9726b409a2004b7dea34ee03c2d09' => 
    array (
      0 => '/var/www/asns/app/View/UserDeckCards/init_list.tpl',
      1 => 1398397019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '556069463534cc50de72943-81498282',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534cc50deb85b5_72859100',
  'variables' => 
  array (
    'data' => 0,
    'deck_number' => 0,
    'over' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534cc50deb85b5_72859100')) {function content_534cc50deb85b5_72859100($_smarty_tpl) {?><div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['user_card_id'])) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?> 
        <div class="strNoSetting">
        デッキ<?php echo $_smarty_tpl->tpl_vars['deck_number']->value;?>

        設定なし
        </div>
    <?php }?> 
    <?php if (!empty($_smarty_tpl->tpl_vars['over']->value)) {?>
        <div class="costOver">
           コストオーバーの為設置できません。 
        </div>
    <?php }?> 
    <div class="btnDeckBack">
        <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
        <a href="<?php echo @constant('BASE_URL');?>
UserDeckCards/index">
        <div class="strDeckBack" >
            戻る
        </div>
        </a>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
      <div class="listBlock">
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>
    
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/pagingNum.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
