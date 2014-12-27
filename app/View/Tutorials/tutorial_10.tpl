<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>強化合成</title>
        <{if $smarty.const.CARRER_IPHONE == $carrer}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/reinforce.css.php">
        <{else}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/reinforce_android.css.php">
        <{/if}>
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/reinforce.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>

    <script type="text/javascript">
      function back()
      {
           location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>Tutorials/tutorial_11";
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
            levelup: "<{$smarty.const.BASE_URL}>img/levelup.png",
            bigsuccess: "<{$smarty.const.BASE_URL}>img/bigsuccess.png"
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
