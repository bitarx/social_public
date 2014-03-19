<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/main.css" />
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.leanModal.min.js"></script>

<title><{$gameTitle}></title>
</head>
<body>
aaaaaaaaaaaaaaaa
    <div id="container">
        <div class="header">
            <img src="<{$smarty.const.BASE_URL}>img/header_base.png" width="663px">
        </div>
        <div class="btn_my">
            <a href="<{$linkUser}>"><img src="<{$smarty.const.BASE_URL}>img/btn_my_on.png"></a>             
            <a href="<{$linkUserCard}>"><img src="<{$smarty.const.BASE_URL}>img/btn_synth_on.png"></a>             
            <a href="<{$linkQuest}>"><img src="<{$smarty.const.BASE_URL}>img/btn_quest_on.png"></a>             
            <a href="<{$linkGacha}>"><img src="<{$smarty.const.BASE_URL}>img/btn_gacha_on.png"></a>             
            <a rel="leanModal" href="#div_menu"><img src="<{$smarty.const.BASE_URL}>img/btn_menu_on.png"></a>             
        </div>

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

</body>
</html>
