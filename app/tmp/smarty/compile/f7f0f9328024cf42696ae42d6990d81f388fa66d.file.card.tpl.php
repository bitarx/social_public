<?php /* Smarty version Smarty-3.1.16, created on 2014-04-18 16:35:13
         compiled from "/var/www/asns/app/View/Elements/card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267981235533d4d63c608b0-04370712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f0f9328024cf42696ae42d6990d81f388fa66d' => 
    array (
      0 => '/var/www/asns/app/View/Elements/card.tpl',
      1 => 1397797835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267981235533d4d63c608b0-04370712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533d4d63c81906_72646970',
  'variables' => 
  array (
    'data' => 0,
    'key' => 0,
    'ctl' => 0,
    'action' => 0,
    'kind' => 0,
    'addParam' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d4d63c81906_72646970')) {function content_533d4d63c81906_72646970($_smarty_tpl) {?><div class="card">
    <?php if (empty($_smarty_tpl->tpl_vars['data']->value['user_card_id'])) {?> 
        <div style="position:absolute;left:50px;">
        設定なし
        </div>
    <?php } else { ?> 
    <div class="cardImg">
       <img src="<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['data']->value['card_id'];?>
" width="160px">
    </div>
    <div class="cardName">
        <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['Card']['card_title'])) {?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['card_title'];?>
<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['card_name'];?>
</span>
        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['card_title'];?>
<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['card_name'];?>
</span>
        <?php }?> 
    </div>
    <div class="cardAtk">
        攻撃:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['atk'];?>
</span>
    </div>
    <div class="cardDef">
        防御:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['def'];?>
</span>
    </div>
    <div class="cardExp">
        経験値:
    </div>
    <div id="progCardExp<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="progCardExp">
    </div>
    <div class="cardExpInt">
        <span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
 / 100</span>
    </div>

    <script type="text/javascript">
        dispProgressCardExp(<?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
, <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 );
    </script>

    <div class="cardLv">
        Lv.<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['level'];?>
</span>
    </div>
    <div class="cardSkillLv">
        スキルLv:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['skill_level'];?>
</span>
    </div>
    <div class="cardSkillName">
        スキル:<span style="color:#ffffff">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['Skill']['skill_name']) {?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Skill']['skill_name'];?>

        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['skill_name'];?>

        <?php }?> 
        </span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['Skill']['skill_words']) {?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Skill']['skill_words'];?>

        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['skill_words'];?>

        <?php }?> 
        </span>
    </div>
    <?php }?> 

     
    <?php if ('UserCards'==$_smarty_tpl->tpl_vars['ctl']->value&&'index'==$_smarty_tpl->tpl_vars['action']->value) {?> 
        <?php if (isset($_smarty_tpl->tpl_vars['key']->value)) {?> 
            <?php if ($_smarty_tpl->tpl_vars['kind']->value==2) {?> 
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
            <?php } else { ?> 
                <div class="strSelectCardCheckBox">
                    選択=><input type="checkbox" name="user_card_id_<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
                </div>
            <?php }?> 
        <?php }?>

     
    <?php } elseif ('UserBaseCards'==$_smarty_tpl->tpl_vars['ctl']->value&&'index'==$_smarty_tpl->tpl_vars['action']->value) {?> 
        <a href="initBaseCard?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
">
            <div class="btnSelectCard">
                <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
                <div class="strSelectCard">
                    ベース選択
                </div>
            </div>
        </a>

     
    <?php } elseif ('UserDeckCards'==$_smarty_tpl->tpl_vars['ctl']->value&&'index'==$_smarty_tpl->tpl_vars['action']->value) {?> 
        <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['user_card_id'])) {?> 
            <form method="get" action="<?php echo @constant('BASE_URL');?>
UserDeckCards/delete">
                <div class="btnSelectCardInUserDeckLeft">
                    <input type="hidden" name="user_deck_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_deck_id'];?>
">
                    <input type="hidden" name="deck_number" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['deck_number'];?>
">
                    <input type="image" src="<?php echo @constant('IMG_URL');?>
btn_cm_s.png">
                    <div class="strSelectCardInUserDeck">
                        外す
                    </div>
                </div>
            </form>
        <?php }?> 
        <form method="get" action="<?php echo @constant('BASE_URL');?>
UserDeckCards/initList">
            <div class="btnSelectCardInUserDeckRight">
                <input type="hidden" name="user_deck_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_deck_id'];?>
">
                <input type="hidden" name="deck_number" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['deck_number'];?>
">
                <input type="image" src="<?php echo @constant('IMG_URL');?>
btn_cm_s.png">
                <div class="strSelectCardInUserDeck">
                    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['user_card_id'])) {?>変更<?php } else { ?>設定<?php }?>  
                </div>
            </div>
        </form>

     
    <?php } elseif ('UserDeckCards'==$_smarty_tpl->tpl_vars['ctl']->value&&'initList'==$_smarty_tpl->tpl_vars['action']->value&&isset($_smarty_tpl->tpl_vars['key']->value)) {?> 
        <a href="init?user_card_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_card_id'];?>
<?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
">
            <div class="btnSelectCard">
                <img src="<?php echo @constant('IMG_URL');?>
btn_cm_m.png">
                <div class="strSelectCard">
                   デッキ設定 
                </div>
            </div>
        </a>
    <?php }?> 

</div>
<?php }} ?>
