<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="charset" content="UTF-8">
        <title>強化合成</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/reinforce.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832px" width="640px"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/reinforce.js"></script>

    <script type="text/javascript">
      function back()
      {
           location.href = "delete";
      }

      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            document.body.onclick  = back;
        }
        reinforce.init(
          "mainCanvas",
          {
            bg: "<{$smarty.const.BASE_URL}>img/bg.jpg", //背景
            sacrificeList: <{$sacrificeList}>,
            cardResult: "<{$baseCard}>",　//合成後カード
            cardGrow: "<{$smarty.const.BASE_URL}>img/cardGlow.png",
            particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
            particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png",
            synthProgBase: "<{$smarty.const.BASE_URL}>img/synth_prog_base.png",
            synthProgRed: "<{$smarty.const.BASE_URL}>img/synth_prog_red.png",
            levelup: "<{$smarty.const.BASE_URL}>img/levelup.png"
          },
          <{$startExp}>,
          <{$endExp}>,
          imageLoadComplete,
          contentsComplete,
          <{$divNum}>
        );
      };

    </script>
</html>
