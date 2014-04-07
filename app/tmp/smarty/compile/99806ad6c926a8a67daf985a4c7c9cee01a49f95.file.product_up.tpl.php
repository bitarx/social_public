<?php /* Smarty version Smarty-3.1.16, created on 2014-04-07 08:01:21
         compiled from "/var/www/asns/app/View/UserCards/product_up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1312487291533fd4c96152a7-84218658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99806ad6c926a8a67daf985a4c7c9cee01a49f95' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/product_up.tpl',
      1 => 1396825278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1312487291533fd4c96152a7-84218658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533fd4c96af632_90125925',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533fd4c96af632_90125925')) {function content_533fd4c96af632_90125925($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>強化合成</title>
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
js/reinforce.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            //location.href = "index";
        }
        reinforce.init(
          "mainCanvas",
          {
            bg: "<?php echo @constant('BASE_URL');?>
img/bg.jpg", //背景
            sacrificeList: [ "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg", "<?php echo @constant('BASE_URL');?>
img/miku.jpg" ],
            cardResult: "<?php echo @constant('BASE_URL');?>
img/miku_v02.jpg",　//合成後カード
            cardGrow: "<?php echo @constant('BASE_URL');?>
img/cardGlow.png",
            particle001: "<?php echo @constant('BASE_URL');?>
img/particle001.png",
            particle002: "<?php echo @constant('BASE_URL');?>
img/particle002.png",
            glowline: "<?php echo @constant('BASE_URL');?>
img/glowline.png",
            synthProgBase: "<?php echo @constant('BASE_URL');?>
img/synth_prog_base.png",
            synthProgRed: "<?php echo @constant('BASE_URL');?>
img/synth_prog_red.png",
            levelup: "<?php echo @constant('BASE_URL');?>
img/levelup.png"
          },
          496,
          imageLoadComplete,
          contentsComplete
        );
      };

    </script>
</html>
<?php }} ?>
