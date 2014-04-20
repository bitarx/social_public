<?php /* Smarty version Smarty-3.1.16, created on 2014-04-19 11:45:48
         compiled from "/var/www/asns/app/View/Stages/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1716485092532e66f3b99d45-18384685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2245ba7f03a7197e00b5605b0f975590074c788' => 
    array (
      0 => '/var/www/asns/app/View/Stages/main.tpl',
      1 => 1397875424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1716485092532e66f3b99d45-18384685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532e66f3bcada2_63068377',
  'variables' => 
  array (
    'prog' => 0,
    'act' => 0,
    'exp' => 0,
    'boss' => 0,
    'data' => 0,
    'notAct' => 0,
    'param' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e66f3bcada2_63068377')) {function content_532e66f3bcada2_63068377($_smarty_tpl) {?><script type="text/javascript">


$(function () {
    dispProgressQuest(<?php echo $_smarty_tpl->tpl_vars['prog']->value;?>
);
    dispProgressQuestAct(<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
);
    dispProgressQuestExp(<?php echo $_smarty_tpl->tpl_vars['exp']->value;?>
);
    dispRotResultQuest();
});
</script>
<div class="stagesMain">


    <?php if (!empty($_smarty_tpl->tpl_vars['boss']->value)) {?> 
        <a href="conf?stage_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['stage_id'];?>
">
            <div  class="btnQuestBoss">
                <img src="<?php echo @constant('BASE_URL');?>
img/btn_st_l.png">
                <div class="strQuestBoss">
                    ボス出現！
                </div>
            </div>
        </a>
        <?php if (empty($_smarty_tpl->tpl_vars['notAct']->value)) {?> 
            <div  class="btnQuestProgBoss" id="appReq" act="Stages/init" params=<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
>
                <img src="<?php echo @constant('BASE_URL');?>
img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <?php } else { ?> 
            <div  class="btnQuestNotProgBoss" id="" act="Stages/init" params=<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <?php }?> 

    <?php } else { ?>
        <?php if (empty($_smarty_tpl->tpl_vars['notAct']->value)) {?> 
            <div  class="btnQuestProg" id="appReq" act="Stages/init" params=<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
>
                <img src="<?php echo @constant('BASE_URL');?>
img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <?php } else { ?> 
            <div  class="btnQuestNotProg" id="" act="Stages/init" params=<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <?php }?> 
    <?php }?> 

    <div class="progQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-<?php echo $_smarty_tpl->tpl_vars['data']->value['use_act'];?>
</span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+<?php if (1==$_smarty_tpl->tpl_vars['data']->value['use_act']) {?>1<?php } else { ?>1～<?php echo $_smarty_tpl->tpl_vars['data']->value['use_act'];?>
<?php }?></span>
        </div>
        <div class="progQuestMainStr">
            進行度:
        </div>
        <div id="progQuestMain" class="progQuestMain">
        </div>
        <div class="progQuestActStr">
            行動力:
        </div>
        <div id="progQuestAct" class="progQuestAct">
        </div>
        <div class="progQuestExpStr">
            経験値:
        </div>
        <div id="progQuestExp" class="progQuestExp">
        </div>
    </div>

    <div id="lotResultQuest" class="lotResultQuest">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="strLotResultDataQuest" class="strLotResultDataQuest">
    </div>


</div>
<?php }} ?>
