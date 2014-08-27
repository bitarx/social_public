<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>10連ガチャ</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/gacha10.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/gacha10.js"></script>

    <script type="text/javascript">
      function back()
      {
           location.href = "comp";
      }

      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            document.body.onclick  = back;
        }
        evolution.init(
          "mainCanvas",
          {
            bg: "<{$smarty.const.IMG_URL}>gacha/product_<{$product}>.jpg", //背景
            card1: "<{$baseCard}>", //合成元カード
            card2: "<{$target}>",　//合成カード
            cardResult: "<{$afterCard}>",　//合成後カード
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
