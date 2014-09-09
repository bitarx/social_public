<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=0.5,minimum-scale=0.5, maximum-scale=0.5, user-scalable=yes">
    <meta charset="UTF-8">
    <{if $carrer == 2}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening.css" />
    <{else}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening_android.css" />
    <{/if}>
    <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/jquery.simplyscroll.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>
    <script src='<{$smarty.const.BASE_URL}>js/jquery.tabs.js'></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.simplyscroll.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/config.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/action.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/main.js"></script>

<title><{$gameTitle}></title>
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
</head>
<body>
    <a href="<{$next}>">
        <div class="slider">
            <ul id="slider">
                <img src="<{$smarty.const.IMG_URL}>tutorial/opening_text.png">
            </ul>
        </div>
    </a>
</body>
