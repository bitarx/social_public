<?php /* Smarty version Smarty-3.1.16, created on 2014-04-18 16:19:31
         compiled from "/var/www/asns/app/View/Elements/paging.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8611509325345ea04c33e50-92009137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31076e1afbdf14aa2a06ddd8b117592afd685b2b' => 
    array (
      0 => '/var/www/asns/app/View/Elements/paging.tpl',
      1 => 1397805549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8611509325345ea04c33e50-92009137',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5345ea04c42c10_38164711',
  'variables' => 
  array (
    'page' => 0,
    'ctl' => 0,
    'ctlAction' => 0,
    'prev' => 0,
    'kind' => 0,
    'rareLevelSelect' => 0,
    'sortItemSelect' => 0,
    'addParam' => 0,
    'pageAll' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5345ea04c42c10_38164711')) {function content_5345ea04c42c10_38164711($_smarty_tpl) {?>    <div class="line">
        <img src="<?php echo @constant('IMG_URL');?>
line.png">
        <div class="paging">
            <?php if ($_smarty_tpl->tpl_vars['page']->value<=1) {?> 
               <div class="btnPagingPrev">
                 <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_off.png" height="30px" width="50px">
                 <div class="strPagingPrev">
                   前 
            <?php } else { ?>
               <div class="btnPagingPrev">
                 <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_on.png" height="30px" width="50px">
                 <div class="strPagingPrev">
                   <?php if ($_smarty_tpl->tpl_vars['ctl']->value=='UserCards') {?>
                     <a href="<?php echo @constant('BASE_URL');?>
<?php echo $_smarty_tpl->tpl_vars['ctlAction']->value;?>
?<?php echo @constant('KEY_PAGING');?>
=<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
&kind=<?php echo $_smarty_tpl->tpl_vars['kind']->value;?>
&rare_level=<?php echo $_smarty_tpl->tpl_vars['rareLevelSelect']->value;?>
&sort_item=<?php echo $_smarty_tpl->tpl_vars['sortItemSelect']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['addParam']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
<?php }?>">前</a> 

                   <?php } else { ?>
                     <a href="<?php echo @constant('BASE_URL');?>
<?php echo $_smarty_tpl->tpl_vars['ctlAction']->value;?>
?<?php echo @constant('KEY_PAGING');?>
=<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['addParam']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
<?php }?>">前</a> 

                   <?php }?>
             <?php }?> 
               </div>
             </div>
             <div class="strPaging">
                 <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
  /  <?php echo $_smarty_tpl->tpl_vars['pageAll']->value;?>

             </div> 
            <?php if ($_smarty_tpl->tpl_vars['pageAll']->value<=$_smarty_tpl->tpl_vars['page']->value) {?> 
               <div class="btnPagingNext">
                 <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_off.png" height="30px" width="50px">
                 <div class="strPagingNext">
                    次
            <?php } else { ?>
               <div class="btnPagingNext">
                 <img src="<?php echo @constant('IMG_URL');?>
btn_cm_ss_on.png" height="30px" width="50px">
                 <div class="strPagingNext">
                   <?php if ($_smarty_tpl->tpl_vars['ctl']->value=='UserCards') {?>
                     <a href="<?php echo @constant('BASE_URL');?>
<?php echo $_smarty_tpl->tpl_vars['ctlAction']->value;?>
?<?php echo @constant('KEY_PAGING');?>
=<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
&kind=<?php echo $_smarty_tpl->tpl_vars['kind']->value;?>
&rare_level=<?php echo $_smarty_tpl->tpl_vars['rareLevelSelect']->value;?>
&sort_item=<?php echo $_smarty_tpl->tpl_vars['sortItemSelect']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['addParam']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
<?php }?>">次</a>
                   <?php } else { ?>
                     <a href="<?php echo @constant('BASE_URL');?>
<?php echo $_smarty_tpl->tpl_vars['ctlAction']->value;?>
?<?php echo @constant('KEY_PAGING');?>
=<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['addParam']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addParam']->value;?>
<?php }?>">次</a>
                   <?php }?>
             <?php }?> 
             </div>
           </div>
        </div>
    </div>
    <div class="line">
        <img src="<?php echo @constant('IMG_URL');?>
line.png">
    </div>
<?php }} ?>
