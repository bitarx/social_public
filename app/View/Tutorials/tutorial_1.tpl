<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=0.5, maximum-scale=0.5, user-scalable=yes">
    <meta charset="UTF-8">
    <{if $carrer == $smarty.const.CARRER_IPHONE}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening.css.php" />
    <{else}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening_android.css.php" />
    <{/if}>
    <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/jquery.simplyscroll.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>
    <script src='<{$smarty.const.BASE_URL}>js/jquery.tabs.js'></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.simplyscroll.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/const.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/action.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/main.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust_opening.js"></script>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <script type="text/javascript" src="<{$smarty.const.NIJI_JSLIB_URL}>js/touch.js"></script>
        <script type="text/javascript">
        $(function() {
            setInterval(function() {
                var height = $(document).height() / 1.8;
                gadgets.window.adjustHeight(height); }, 500);
        });
        </script>
    <{/if}>

<title><{$gameTitle}></title>
<{if $carrer == $smarty.const.CARRER_IPHONE}>
<script type="text/javascript">
(function($) {
  $(function() {
    $("#slider").simplyScroll({
      orientation: 'vertical',
      auto: true,
      manualMode: 'loop',
      frameRate: 10,
      speed: 5,
      pauseOnHover:false
    });
  });
})(jQuery);
</script>
<{/if}>
<{if $smarty.const.PLATFORM_ENV == 'hills'}>
<script type="text/javascript">
  window.addEventListener("load", function(e) {
    var target = (parent.postMessage ? parent : (parent.document.postMessage ? parent.document : undefined));

    var btn = document.getElementById("startGameButton");
    btn.addEventListener("click", function(evt) {
      var url          = "<{$smarty.const.BASE_URL}>set_cookie_hills.php?oid=<{$ownerId}>&vid=<{$viewerId}>";
      var callback_url = "<{$smarty.const.BASE_URL}>Tutorials/tutorial_2";
      var params       = "url=" + encodeURIComponent(url) + "&callback_url=" + encodeURIComponent(callback_url); 
      target.postMessage("setCookie:" + params, '*');
    });
  });
</script>
<{elseif $smarty.const.PLATFORM_ENV == 'niji'}>
<script type="text/javascript">
  window.addEventListener("load", function(e) {

    var btn = document.getElementById("startGameButton");
    btn.addEventListener("click", function(evt) {

        // トップフレームでiframe内のドメインを呼び出す指示
        nijiyome.cookie({
            "url": "<{$smarty.const.BASE_URL}>set_cookie_niji.php?oid=<{$ownerId}>|<{$viewerId}>",  // cookie初回書き込み用URL
            "callback_url": "<{$smarty.const.BASE_URL}>index.php/Tutorials/tutorial_2"  // 書き込み後の戻りでiframe内に表示するURL
        });
    });
  });
</script>
<{/if}>
</head>
<body>
        <div class="slider">
            <ul id="slider">
                <img src="<{$smarty.const.IMG_URL}>tutorial/opening_text.png" class="opening_text" >
            </ul>
        </div>
    <{if 'waku' == $smarty.const.PLATFORM_ENV}>
        <div class="btnStart">
            <a href="<{$smarty.const.BASE_URL}>Tutorials/tutorial_2">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="start" name="submit" class="btnStrongL">
            <div class="strStart">
               ゲームスタート 
            </div>
            </a>
        </div>
    <{elseif 'hills' == $smarty.const.PLATFORM_ENV}>
        <div id="startGameButton" class="btnStart">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="start" name="submit" class="btnStrongL">
            <div class="strStart">
               ゲームスタート 
            </div>
        </div>
    <{else}>
        <div id="startGameButton" class="btnStartNiji">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="start" name="submit" class="btnStrongL">
            <div class="strStart">
               ゲームスタート 
            </div>
        </div>
    <{/if}>
    <div style="height:60px"></div>
</body>
