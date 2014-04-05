<?php /* Smarty version Smarty-3.1.16, created on 2014-04-05 18:41:18
         compiled from "/var/www/asns/app/View/UserCards/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1370383112533be23e65e7c2-65739843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205e299528d049916f1d0db52d1bb2e343ef162a' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/index.tpl',
      1 => 1396683511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1370383112533be23e65e7c2-65739843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533be23e691298_57108462',
  'variables' => 
  array (
    'list' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533be23e691298_57108462')) {function content_533be23e691298_57108462($_smarty_tpl) {?><div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="changeBase">
        <img src="<?php echo @constant('IMG_URL');?>
btn_cm_l.png">
        <a href="<?php echo @constant('BASE_URL');?>
UserBaseCards/index">
        <div class="strChangeBase" >
            ベースカードを変更
        </div>
        </a>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <a href="<?php echo @constant('BASE_URL');?>
UserCards/conf?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
            <div class="btnSelectCard">
                <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
                <div class="strSelectCardSozai">
                    素材に選択
                </div>
            </div>
        </a>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>

</div>
<?php }} ?>
