<?php /* Smarty version Smarty-3.1.16, created on 2014-04-03 21:00:35
         compiled from "/var/www/asns/app/View/UserCards/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1370383112533be23e65e7c2-65739843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205e299528d049916f1d0db52d1bb2e343ef162a' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/index.tpl',
      1 => 1396526433,
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
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533be23e691298_57108462')) {function content_533be23e691298_57108462($_smarty_tpl) {?><script type="text/javascript">
$(function () {
    dispProgressQuestExp(<?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
);
});
</script> 
<div class="userCards index">
    <div class="bannerTitle">
        <img src="<?php echo @constant('IMG_URL');?>
banner_title.png">
        <div class="strTitle" >
            強化進化
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
