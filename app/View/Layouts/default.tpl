<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=640px;initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" >
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/main.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/config.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/action.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/main.js"></script>

<title><{$gameTitle}></title>
</head>
<body>
<{*
    <div id="loading" class="loading">
        <img src="<{$smarty.const.BASE_URL}>img/loading.gif" width="45px">
    </div>
*}>
    <div id="container">
        <div class="header">
            <img src="<{$smarty.const.BASE_URL}>img/header_base.png">
        </div>

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
        <{include file="../Elements/header_menu.tpl"}>   
<div id="errMes"></div>
</body>
</html>
