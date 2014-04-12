<?php /* Smarty version Smarty-3.1.16, created on 2014-04-11 11:40:04
         compiled from "/var/www/asns/app/View/UserCards/product_evol.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11681466385343a917783fd2-72389826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b56b2e15bfed6ae24ca3aa8fb08cb06ba009de4b' => 
    array (
      0 => '/var/www/asns/app/View/UserCards/product_evol.tpl',
      1 => 1397183864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11681466385343a917783fd2-72389826',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5343a9177eb770_45065670',
  'variables' => 
  array (
    'baseCard' => 0,
    'target' => 0,
    'afterCard' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343a9177eb770_45065670')) {function content_5343a9177eb770_45065670($_smarty_tpl) {?><!DOCTYPE HTML>
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
            location.href = "index";
        }
        evolution.init(
          "mainCanvas",
          {
            bg: "<?php echo @constant('BASE_URL');?>
img/bg.jpg", //背景
            card1: "<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['baseCard']->value;?>
", //合成元カード
            card2: "<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['target']->value;?>
",　//合成カード
            cardResult: "<?php echo @constant('FILEOUT_URL');?>
?size=m&dir=card&target=<?php echo $_smarty_tpl->tpl_vars['afterCard']->value;?>
",　//合成後カード
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
