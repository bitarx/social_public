<?php /* Smarty version Smarty-3.1.16, created on 2014-04-03 22:05:50
         compiled from "/var/www/asns/app/View/Layouts/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9769298505324f0444e5e42-67060483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b960c17ee805065fbd9c48ca4a6457f8f921f37' => 
    array (
      0 => '/var/www/asns/app/View/Layouts/default.tpl',
      1 => 1396526566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9769298505324f0444e5e42-67060483',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5324f0444ec551_24798438',
  'variables' => 
  array (
    'gameTitle' => 0,
    'content_for_layout' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5324f0444ec551_24798438')) {function content_5324f0444ec551_24798438($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=640px;initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" >
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo @constant('BASE_URL');?>
css/main.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
js/config.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
js/action.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
js/main.js"></script>

<title><?php echo $_smarty_tpl->tpl_vars['gameTitle']->value;?>
</title>
</head>
<body>

    <div id="container">
        <div class="header">
            <img src="<?php echo @constant('BASE_URL');?>
img/header_base.png">
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/header_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   

        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <script type="text/javascript">
        $(function() {
            $( 'a[rel*=leanModal]').leanModal({
                top: 1,                      // モーダルウィンドウの縦位置を指定
                left: 1,                     // モーダルウィンドウの左位置を指定
                overlay : 1.0,               // 背面の透明度
                closeButton: ".menu_close"  // 閉じるボタンのCSS classを指定
            });
        });
        </script>

        <?php echo $_smarty_tpl->tpl_vars['content_for_layout']->value;?>

    </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../Elements/header_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   
<div id="errMes"></div>
</body>
</html>
<?php }} ?>
