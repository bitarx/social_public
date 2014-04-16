<?php /* Smarty version Smarty-3.1.16, created on 2014-04-16 13:28:53
         compiled from "/var/www/asns/app/View/Elements/status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:703415139534dd2efb52af3-13239362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4de2d2e0d93cea3604f246f6133cc47f9296a419' => 
    array (
      0 => '/var/www/asns/app/View/Elements/status.tpl',
      1 => 1397622532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '703415139534dd2efb52af3-13239362',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534dd2efc6f501_32188388',
  'variables' => 
  array (
    'name' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534dd2efc6f501_32188388')) {function content_534dd2efc6f501_32188388($_smarty_tpl) {?><div class="status">
    <div class="subTitle">
       <img src="<?php echo @constant('IMG_URL');?>
textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 
        </div>
    </div>
    <div class="myLevel">
        レベル:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['level'];?>
</span>
    </div>
    <div class="myAct">
        行動力:
    </div>
    <div id="progQuestAct" class="progMyAct">
    </div>
    <div class="myActInt">
        <span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['act'];?>
 / <?php echo $_smarty_tpl->tpl_vars['data']->value['act_max'];?>
</span>
    </div>

    <script type="text/javascript">
        dispProgressQuestAct(<?php echo $_smarty_tpl->tpl_vars['data']->value['act'];?>
);
    </script>

    <div class="cardCnt">
        カード：<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['card_cnt'];?>
 / <?php echo @constant('CARD_MAX_NUM');?>
</span>
    </div>


</div>
<?php }} ?>
