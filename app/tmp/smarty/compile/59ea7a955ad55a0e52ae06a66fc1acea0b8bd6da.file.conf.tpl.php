<?php /* Smarty version Smarty-3.1.16, created on 2014-04-08 17:52:48
         compiled from "/var/www/asns/app/View/UserCards/conf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326081342533fafdbbcb267-98938198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59ea7a955ad55a0e52ae06a66fc1acea0b8bd6da' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/conf.tpl',
      1 => 1396947051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326081342533fafdbbcb267-98938198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533fafdbc27542_01089328',
  'variables' => 
  array (
    'list' => 0,
    'userParam' => 0,
    'useMoney' => 0,
    'judgeEvol' => 0,
    'money' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533fafdbc27542_01089328')) {function content_533fafdbc27542_01089328($_smarty_tpl) {?><div style="position:relative">
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="subTitle">
       <img src="<?php echo @constant('IMG_URL');?>
textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            進化確認
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Elements/card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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

    <?php if (!$_smarty_tpl->tpl_vars['judgeEvol']->value) {?> 
        <div style="text-align:center;">
            進化できません。
        </div>
    <?php } elseif (!$_smarty_tpl->tpl_vars['money']->value) {?> 
        <div style="text-align:center;">
            <?php echo @constant('MONEY_NAME');?>
が足りません。
        </div>
    <?php } else { ?>
    <a href="<?php echo @constant('BASE_URL');?>
UserCards/actEvol?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
        <div class="btnSelectSt">
            <img src="<?php echo @constant('IMG_URL');?>
btn_st_l.png">
            <div class="strSelectStComp">
                合成する
            </div>
        </div>
    </a>
    <?php }?>

</div>
<?php }} ?>
