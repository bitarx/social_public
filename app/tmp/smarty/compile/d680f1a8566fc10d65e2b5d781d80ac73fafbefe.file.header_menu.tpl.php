<?php /* Smarty version Smarty-3.1.16, created on 2014-04-02 19:09:48
         compiled from "/var/www/asns/app/View/Elements/header_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2091715004532df2cfab27b2-07683567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd680f1a8566fc10d65e2b5d781d80ac73fafbefe' => 
    array (
      0 => '/var/www/asns/app/View/Elements/header_menu.tpl',
      1 => 1396433370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2091715004532df2cfab27b2-07683567',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532df2cfaf4085_96995170',
  'variables' => 
  array (
    'tutoEnd' => 0,
    'linkUser' => 0,
    'linkUserCard' => 0,
    'linkQuest' => 0,
    'linkGacha' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532df2cfaf4085_96995170')) {function content_532df2cfaf4085_96995170($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['tutoEnd']->value==1) {?>  
    <div class="btn_my">
        <a href="<?php echo $_smarty_tpl->tpl_vars['linkUser']->value;?>
"><img src="<?php echo @constant('BASE_URL');?>
img/btn_my_on.png"></a>
    </div>
    <div class="btn_synth">
        <a href="<?php echo $_smarty_tpl->tpl_vars['linkUserCard']->value;?>
"><img src="<?php echo @constant('BASE_URL');?>
img/btn_synth_on.png"></a>
    </div>
    <div class="btn_quest">
        <a href="<?php echo $_smarty_tpl->tpl_vars['linkQuest']->value;?>
"><img src="<?php echo @constant('BASE_URL');?>
img/btn_quest_on.png"></a>
    </div>        <div class="btn_gacha">
        <a href="<?php echo $_smarty_tpl->tpl_vars['linkGacha']->value;?>
"><img src="<?php echo @constant('BASE_URL');?>
img/btn_gacha_on.png"></a>
    </div>
    <div class="btn_menu">
        <a rel="leanModal" href="#div_menu"><img src="<?php echo @constant('BASE_URL');?>
img/btn_menu_on.png"></a>
    </div>

<?php } else { ?> 

    <div class="btn_my_off">
       <img src="<?php echo @constant('BASE_URL');?>
img/btn_my_off.png">
    </div>
    <div class="btn_synth_off">
        <img src="<?php echo @constant('BASE_URL');?>
img/btn_synth_off.png">
    </div>
    <div class="btn_quest_off">
        <img src="<?php echo @constant('BASE_URL');?>
img/btn_quest_off.png">
    </div>        
    <div class="btn_gacha_off">
        <img src="<?php echo @constant('BASE_URL');?>
img/btn_gacha_off.png">
    </div>
    <div class="btn_menu_off">
        <img src="<?php echo @constant('BASE_URL');?>
img/btn_menu_off.png">
    </div>
<?php }?> 
<?php }} ?>
