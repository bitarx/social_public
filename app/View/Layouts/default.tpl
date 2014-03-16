<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/main.css" />
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.leanModal.min.js"></script>

<title><{$gameTitle}></title>
</head>
<body>
    <div id="container">
        <div class="header">
            <img src="../img/header_base.png" width="663px">
        </div>
        <div class="btn_my">
            <a href="<{$linkUser}>"><img src="../img/btn_my_on.png"></a>             
            <a href="<{$linkUserCard}>"><img src="../img/btn_synth_on.png"></a>             
            <a href="<{$linkQuest}>"><img src="../img/btn_quest_on.png"></a>             
            <a href="<{$linkGacha}>"><img src="../img/btn_gacha_on.png"></a>             
            <a href=""><img src="../img/btn_menu_on.png"></a>             
        </div>
        <{$content_for_layout}>
    </div>

</body>
</html>
