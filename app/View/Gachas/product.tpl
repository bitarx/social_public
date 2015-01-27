<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ガチャ</title>
        <{if $smarty.const.CARRER_IPHONE == $carrer}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/gacha.css.php">
        <{else}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/gacha_android.css.php">
        <{/if}>
        <style type="text/css">  
        <!-- 
            #mainCanvas {
              background-image: url("<{$smarty.const.IMG_URL}>gacha/product_<{$product}>.gif?t=<{$time}>");
              background-size:contain;
            }
        -->
        </style>
    </head>
    <body>
        <canvas id="mainCanvas" height="800px" width="640px"></canvas>
    </body>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/gacha.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <script type="text/javascript" src="<{$smarty.const.NIJI_JSLIB_URL}>js/touch.js"></script>
        <script type="text/javascript">
        $(function() {
            setInterval(function() {
                var height = $(document).height() / 2;
                gadgets.window.adjustHeight(height); }, 500);
        });
        </script>
    <{/if}>

    <script type="text/javascript">
      function back()
      {
           location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>Gachas/end?has_max_flg=<{$hasMaxFlg}>";
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
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png",
            pushL: "<{$smarty.const.BASE_URL}>img/push_l.png",
            pushS: "<{$smarty.const.BASE_URL}>img/push_s.png"
          },
          imageLoadComplete,
          contentsComplete,
          <{$divNum}>,
          <{$pushStartTime}>
        );
      };

    </script>
    <script type="text/javascript">
        //スクロール停止
        document.ontouchmove = function( e ){
            event.preventDefault();
        }
    </script>
</html>
