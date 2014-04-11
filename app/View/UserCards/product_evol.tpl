<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>進化合成</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/evolution.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/evolution.js"></script>

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
            bg: "<{$smarty.const.BASE_URL}>img/bg.jpg", //背景
            card1: "<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$baseCard}>", //合成元カード
            card2: "<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$target}>",　//合成カード
            cardResult: "<{$smarty.const.FILEOUT_URL}>?size=l&dir=card&target=<{$afterCard}>",　//合成後カード
            cardGrow: "<{$smarty.const.BASE_URL}>img/cardGlow.png",
            particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
            particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png"
          },
          imageLoadComplete,
          contentsComplete
        );
      };

    </script>
</html>
