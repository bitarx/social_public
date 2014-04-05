<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>強化合成</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/evolution.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/reinforce.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            location.href = "index";
        }
        reinforce.init(
          "mainCanvas",
          {
            bg: "<{$smarty.const.BASE_URL}>img/bg.jpg", //背景
            sacrificeList: [ "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg", "<{$smarty.const.BASE_URL}>img/miku.jpg" ],
            cardResult: "<{$smarty.const.BASE_URL}>img/miku_v02.jpg",　//合成後カード
            cardGrow: "<{$smarty.const.BASE_URL}>img/cardGlow.png",
            particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
            particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png",
            synthProgBase: "<{$smarty.const.BASE_URL}>img/synth_prog_base.png",
            synthProgRed: "<{$smarty.const.BASE_URL}>img/synth_prog_red.png",
            levelup: "<{$smarty.const.BASE_URL}>img/levelup.png"
          },
          496,
          imageLoadComplete,
          contentsComplete
        );
      };

    </script>
</html>
