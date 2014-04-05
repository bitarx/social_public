<?php /* Smarty version Smarty-3.1.16, created on 2014-04-05 16:03:36
         compiled from "/var/www/asns/app/View/Elements/card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267981235533d4d63c608b0-04370712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f0f9328024cf42696ae42d6990d81f388fa66d' => 
    array (
      0 => '/var/www/asns/app/View/Elements/card.tpl',
      1 => 1396681148,
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
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d4d63c81906_72646970')) {function content_533d4d63c81906_72646970($_smarty_tpl) {?><div class="cardListImg">
   <img src="<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['data']->value['card_id'];?>
" width="160px">
</div>
<div class="cardList">
    <div class="cardListName">
        <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['Card']['card_title'])) {?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['card_title'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['card_name'];?>

        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['card_title'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['card_name'];?>

        <?php }?> 
    </div>
    <div class="cardListAtk">
        攻撃:<?php echo $_smarty_tpl->tpl_vars['data']->value['atk'];?>

    </div>
    <div class="cardListDef">
        防御:<?php echo $_smarty_tpl->tpl_vars['data']->value['def'];?>

    </div>
    <div class="cardListExp">
        経験値:
    </div>
    <div class="progCardListExp">
    </div>
    <div id="progCardExp<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="progCardListExpBar">
    </div>
    <div class="cardListExpInt">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
 / 100
    </div>

    <script type="text/javascript">
        dispProgressCardExp(<?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
, <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 );
    </script>

    <div class="cardListLv">
        Lv.<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['level'];?>
</span>
    </div>
    <div class="cardListSkillLv">
        スキルLv:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['skill_level'];?>
</span>
    </div>
    <div class="cardListSkillName">
        スキル:<span style="color:#ffffff">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_name']) {?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_name'];?>

        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Skill']['skill_name'];?>

        <?php }?> 
        </span>
    </div>
    <div class="cardListSkillEft">
        効果:<span style="color:#ffffff">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_name']) {?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_words'];?>

        <?php } else { ?> 
            <?php echo $_smarty_tpl->tpl_vars['data']->value['Skill']['skill_words'];?>

        <?php }?> 
        </span>
    </div>
</div>
<?php }} ?>
