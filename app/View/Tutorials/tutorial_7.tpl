<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>進化合成</title>
        <{if $smarty.const.CARRER_IPHONE == $carrer}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/evolution.css.php">
        <{else}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/evolution_android.css.php">
        <{/if}>
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/evolution.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <script type="text/javascript" src="<{$smarty.const.NIJI_JSLIB_URL}>js/touch.js"></script>
        <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust_niji.js"></script>
    <{/if}>

    <script type="text/javascript">
      function back()
      {
           location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>Tutorials/tutorial_8";
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
            bg: "<{$smarty.const.BASE_URL}>img/bg.jpg", //背景
            card1: "<{$baseCard}>", //合成元カード
            card2: "<{$target}>",　//合成カード
            cardResult: "<{$afterCard}>",　//合成後カード
            cardGrow: "<{$smarty.const.BASE_URL}>img/cardGlow.png",
            particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
            particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png",
            pushL: "<{$smarty.const.BASE_URL}>img/push_l.png",
            pushS: "<{$smarty.const.BASE_URL}>img/push_s.png"
          },
          imageLoadComplete,
          contentsComplete,
          <{$divNum}>
        );
      };

    </script>
</html>
