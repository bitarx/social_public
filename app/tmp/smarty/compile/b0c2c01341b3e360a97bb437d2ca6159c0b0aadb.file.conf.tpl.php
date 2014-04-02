<?php /* Smarty version Smarty-3.1.16, created on 2014-03-29 20:18:10
         compiled from "/var/www/asns/app/View/Stages/conf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211391306532f92c7884b67-66275944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0c2c01341b3e360a97bb437d2ca6159c0b0aadb' => 
    array (
      0 => '/var/www/asns/app/View/Stages/conf.tpl',
      1 => 1396076004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211391306532f92c7884b67-66275944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532f92c78b5fb7_71510292',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532f92c78b5fb7_71510292')) {function content_532f92c78b5fb7_71510292($_smarty_tpl) {?><div class="stages index">
    <div>
        <img src="<?php echo @constant('BASE_URL');?>
File/outimage?size=bf&dir=scene&target=<?php echo $_smarty_tpl->tpl_vars['data']->value['enemy_id'];?>
" >
    </div>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['before_words'];?>
 
    </div>
        <a href="act?target_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['enemy_id'];?>
">
            <div  class="btnQuestBossBattle">
                <img src="<?php echo @constant('BASE_URL');?>
img/btn_st_l.png">
                <div class="strQuestBossBattle">
                    鎮激開始！
                </div>
            </div>
        </a>
</div>
<?php }} ?>
