<?php /* Smarty version Smarty-3.1.16, created on 2014-04-09 18:08:33
         compiled from "/var/www/asns/app/View/UserCards/conf_up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9732278435344c843e56263-20010914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3f175ea77cff226eb616255ba5508ab760a5c0c' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/conf_up.tpl',
      1 => 1397034497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9732278435344c843e56263-20010914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5344c843edd4f5_59291698',
  'variables' => 
  array (
    'userParam' => 0,
    'useMoney' => 0,
    'money' => 0,
    'list' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344c843edd4f5_59291698')) {function content_5344c843edd4f5_59291698($_smarty_tpl) {?><div style="position:relative">
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="subTitle">
       <img src="<?php echo @constant('IMG_URL');?>
textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            強化確認
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="synthConfMsg">
        所持<?php echo @constant('MONEY_NAME');?>
:<?php echo $_smarty_tpl->tpl_vars['userParam']->value['money'];?>
<br /> 
        <span style="color:#FF4500;">必要<?php echo @constant('MONEY_NAME');?>
:<?php echo $_smarty_tpl->tpl_vars['useMoney']->value;?>
</span> 
    </div>

    <?php if (!$_smarty_tpl->tpl_vars['money']->value) {?> 
        <div style="text-align:center;">
            <?php echo @constant('MONEY_NAME');?>
が足りません。
        </div>
    <?php } else { ?>
        <form method=="POST" action="actUp">
            <div class="btnUpComp">
                <input type="image" src="<?php echo @constant('IMG_URL');?>
btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    合成実行
                </div>
            </div>
    <?php }?>

    <div class="subTitleMiddle">
       <img src="<?php echo @constant('IMG_URL');?>
textarea_gd.png"  height="32px" width="680px">
        <div class="subTitleMiddleStr">
           選択された素材
        </div>
    </div>

    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <input type="hidden" name="user_card_id_<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
    <?php } ?>

    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="synthConfMsg">
        所持<?php echo @constant('MONEY_NAME');?>
:<?php echo $_smarty_tpl->tpl_vars['userParam']->value['money'];?>
<br /> 
        <span style="color:#FF4500;">必要<?php echo @constant('MONEY_NAME');?>
:<?php echo $_smarty_tpl->tpl_vars['useMoney']->value;?>
</span> 
    </div>
    <?php if (!$_smarty_tpl->tpl_vars['money']->value) {?> 
        <div style="text-align:center;">
            <?php echo @constant('MONEY_NAME');?>
が足りません。
        </div>
    <?php } else { ?>
            <div class="btnUpComp">
                <input type="image" src="<?php echo @constant('IMG_URL');?>
btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    合成実行
                </div>
            </div>
        </form>
    <?php }?>

</div>
<?php }} ?>
