<?php /* Smarty version Smarty-3.1.16, created on 2014-04-19 10:49:42
         compiled from "/var/www/asns/app/View/Stages/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:882034647532f93334643d2-21193292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0637e3fa2a5ae9334c21684e8e26e21e5427ece1' => 
    array (
      0 => '/var/www/asns/app/View/Stages/product.tpl',
      1 => 1396590059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '882034647532f93334643d2-21193292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532f9333497997_45125194',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532f9333497997_45125194')) {function content_532f9333497997_45125194($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>進化合成</title>
        <link rel=stylesheet type="text/css" href="<?php echo @constant('BASE_URL');?>
css/evolution.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<?php echo @constant('BASE_URL');?>
js/evolution.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            <?php if ($_smarty_tpl->tpl_vars['data']->value['result']==2) {?>
                location.href = "comp";
            <?php } else { ?>
                location.href = "scene";
            <?php }?>
        }
        evolution.init(
          "mainCanvas",
          {
            bg: "<?php echo @constant('BASE_URL');?>
img/bg.jpg", //背景
            card1: "<?php echo @constant('BASE_URL');?>
img/miku.jpg", //合成元カード
            card2: "<?php echo @constant('BASE_URL');?>
img/miku.jpg",　//合成カード
            cardResult: "<?php echo @constant('BASE_URL');?>
img/miku_v02.jpg",　//合成後カード
            cardGrow: "<?php echo @constant('BASE_URL');?>
img/cardGlow.png",
            particle001: "<?php echo @constant('BASE_URL');?>
img/particle001.png",
            particle002: "<?php echo @constant('BASE_URL');?>
img/particle002.png",
            glowline: "<?php echo @constant('BASE_URL');?>
img/glowline.png"
          },
          imageLoadComplete,
          contentsComplete
        );
      };

    </script>
</html>
<?php }} ?>
