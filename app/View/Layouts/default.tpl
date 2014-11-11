<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta charset="UTF-8">
    <{if $carrer == 2}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/main.css" />
    <{else}>
        <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/main_android.css" />
    <{/if}>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>
    <script src='<{$smarty.const.BASE_URL}>js/jquery.tabs.js'></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/<{$smarty.const.DOMAIN}>.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/action.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/main.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>

<title><{$gameTitle}></title>
</head>
<body>
    <div class="contents">

        <{include file="../Elements/header_menu.tpl"}>   

        <{include file="../Elements/menu.tpl"}>

        <script type="text/javascript">
        $(function() {
            $( 'a[rel*=leanModal]').leanModal({
                top: 1,                      // モーダルウィンドウの縦位置を指定
                left: 1,                     // モーダルウィンドウの左位置を指定
                overlay : 1.0,               // 背面の透明度
                closeButton: ".menu_close"  // 閉じるボタンのCSS classを指定
            });
        });
        </script>

        <{$content_for_layout}>
    </div>
<div id="errMes"></div>
</body>
</html>
