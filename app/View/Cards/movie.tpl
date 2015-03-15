<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
    <meta charset="UTF-8">
    <{if $smarty.const.PLATFORM_ENV != 'waku'}>
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Expires" content="0" />
    <{/if}>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <{if $carrer == $smarty.const.CARRER_IPHONE}>
        <{if $smarty.const.PLATFORM_ENV == 'waku'}>
            <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening_waku.css.php" />
        <{else}>
            <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening.css.php" />
        <{/if}>
        <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust_niji.js"></script>
    <{else}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/opening_android.css.php" />
        <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust_niji_android.js"></script>
    <{/if}>
    <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/jquery.simplyscroll.css" />

    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>
    <script src='<{$smarty.const.BASE_URL}>js/jquery.tabs.js'></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.simplyscroll.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/const.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/action.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/main.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust_opening.js"></script>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <script type="text/javascript" src="<{$smarty.const.NIJI_JSLIB_URL}>js/touch.js"></script>
    <{/if}>

<title><{$gameTitle}></title>
</head>
<body>
    <div class="slider">
    <{if $carrer == $smarty.const.CARRER_IPHONE}>
        <video width="320px" height="420px" src="<{$smarty.const.IMG_URL}><{$smarty.const.MOVIE_DIR}>/card/card_<{$cardId}>.mp4">
          <p>HTML5 Videoに対応したブラウザでご覧ください</p>
        </video>
    <{else}>
        <video width="320px" height="420px" src="<{$smarty.const.IMG_URL}><{$smarty.const.MOVIE_DIR}>/card/card_<{$cardId}>.mp4" poster="<{$smarty.const.IMG_URL}>btn_mvplay_card.png" onclick="this.play();" preload="none">
          <p>HTML5 Videoに対応したブラウザでご覧ください</p>
        </video>
    <{/if}>

    </div>
    <div class="playNotice">
        ※再生すると音声が出ます
    </div>
    <div class="btnStartMovie">
        <a href="<{$smarty.const.BASE_URL}>Cards/index/<{$cardId}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png" alt="start" name="submit" class="btnStrongL">
            <div class="strStartMovie">
                戻る
            </div>
        </a>
    </div>
    <div style="height:60px"></div>
</body>
