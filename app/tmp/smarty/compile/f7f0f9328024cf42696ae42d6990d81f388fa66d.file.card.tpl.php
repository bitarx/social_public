<?php /* Smarty version Smarty-3.1.16, created on 2014-04-03 21:00:35
         compiled from "/var/www/asns/app/View/Elements/card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267981235533d4d63c608b0-04370712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f0f9328024cf42696ae42d6990d81f388fa66d' => 
    array (
      0 => '/var/www/asns/app/View/Elements/card.tpl',
      1 => 1396526382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267981235533d4d63c608b0-04370712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533d4d63c81906_72646970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d4d63c81906_72646970')) {function content_533d4d63c81906_72646970($_smarty_tpl) {?><div class="card">
    <div class="cardImg">
        <img src="<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['data']->value['card_id'];?>
" width="160px">
    </div>
    <div class="cardLv">
        Lv.<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['level'];?>
</span>
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
    <div id="progQuestExp" class="progCardExp"></div>
    <div class="cardExpInt">
       <span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['exp'];?>
 / 100</span>
    </div>
    <div class="cardSkillLv">
        スキルLv:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['skill_level'];?>
</span>
    </div>
    <div class="cardSkillName">
        スキル:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_name'];?>
</span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['data']->value['Card']['Skill']['skill_words'];?>
</span>
    </div>
</div>
<?php }} ?>
