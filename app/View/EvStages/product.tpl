<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ボスバトル</title>
        <{if $smarty.const.CARRER_IPHONE == $carrer}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/enemybattle.css.php">
        <{else}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/enemybattle.css.php">
        <{/if}>
    </head>
    <body id="body">
        <canvas id="mainCanvas" height="832" width="640"></canvas>
        <div id="skip" class="skip">skip<div>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/preloadjs-0.4.1.min.js"></script>

    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.utils.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.stocker.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.loader.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.view.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.main.js"></script>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <script type="text/javascript" src="<{$smarty.const.NIJI_JSLIB_URL}>js/touch.js"></script>
    <{/if}>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {
            setTimeout("boss.main.skip()", 3200);
        }
        var contentsComplete = function() {
            var element = document.getElementById("body");
            element.addEventListener("click", function(){
                <{if $data.result == 2}>
                    location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>EvStages/comp";
                <{else}>
                    location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>EvStages/scene";
                <{/if}>
            });
        }

        var canvasID = "mainCanvas";
        var fileName = {
          bg: "<{$smarty.const.BASE_URL}>img/clear.png", //背景
          namePlate: "<{$smarty.const.BASE_URL}>img/textarea_gd.png", //背景
          enemyHPProgBase: "<{$smarty.const.BASE_URL}>img/hp_prog_base.png",
          enemyHPProgRed: "<{$smarty.const.BASE_URL}>img/hp_prog_red.png",
          playerHPProgBase: "<{$smarty.const.BASE_URL}>img/progress_base.png",
          playerHPProgBaseT: "<{$smarty.const.BASE_URL}>img/touka_prog.png",
          playerHPProgBar: "<{$smarty.const.BASE_URL}>img/progress_yellow.png",
          fukidashiMiddle: "<{$smarty.const.BASE_URL}>img/fukidashi_middle.png",
          fukidashiLeftUnder: "<{$smarty.const.BASE_URL}>img/fukidashi_left_under.png",
          particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
          particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
          winText: "<{$smarty.const.BASE_URL}>img/win.png",
          winText: "<{$smarty.const.BASE_URL}>img/win.png",
          loseText: "<{$smarty.const.BASE_URL}>img/lose.png",
          battleStartText: "<{$smarty.const.BASE_URL}>img/battle_start.png",
          arrow: "<{$smarty.const.BASE_URL}>img/arrow.png",
          attack001: "<{$smarty.const.BASE_URL}>img/attack001.png",
          attack002: "<{$smarty.const.BASE_URL}>img/attack002.png",
          playerPowerUP: "<{$smarty.const.BASE_URL}>img/playerPowerUP.png",
          playerPowerDown: "<{$smarty.const.BASE_URL}>img/playerPowerDown.png",
          gion001: "<{$smarty.const.BASE_URL}>img/gion001.png",
          gion002: "<{$smarty.const.BASE_URL}>img/gion002.png",
          gion003: "<{$smarty.const.BASE_URL}>img/gion003.png",
          yajirushiDown: "<{$smarty.const.BASE_URL}>img/yajirushi_down.png",
          numSL: "<{$smarty.const.BASE_URL}>img/num_sl.png",
          numList: [ "<{$smarty.const.BASE_URL}>img/num_0.png", "<{$smarty.const.BASE_URL}>img/num_1.png", "<{$smarty.const.BASE_URL}>img/num_2.png", "<{$smarty.const.BASE_URL}>img/num_3.png", "<{$smarty.const.BASE_URL}>img/num_4.png", "<{$smarty.const.BASE_URL}>img/num_5.png", "<{$smarty.const.BASE_URL}>img/num_6.png", "<{$smarty.const.BASE_URL}>img/num_7.png", "<{$smarty.const.BASE_URL}>img/num_8.png", "<{$smarty.const.BASE_URL}>img/num_9.png" ],
          num_l_List: [ "<{$smarty.const.BASE_URL}>img/num_l_0.png", "<{$smarty.const.BASE_URL}>img/num_l_1.png", "<{$smarty.const.BASE_URL}>img/num_l_2.png", "<{$smarty.const.BASE_URL}>img/num_l_3.png", "<{$smarty.const.BASE_URL}>img/num_l_4.png", "<{$smarty.const.BASE_URL}>img/num_l_5.png", "<{$smarty.const.BASE_URL}>img/num_l_6.png", "<{$smarty.const.BASE_URL}>img/num_l_7.png", "<{$smarty.const.BASE_URL}>img/num_l_8.png", "<{$smarty.const.BASE_URL}>img/num_l_9.png" ],
          num_d_List: [ "<{$smarty.const.BASE_URL}>img/num_d_0.png", "<{$smarty.const.BASE_URL}>img/num_d_1.png", "<{$smarty.const.BASE_URL}>img/num_d_2.png", "<{$smarty.const.BASE_URL}>img/num_d_3.png", "<{$smarty.const.BASE_URL}>img/num_d_4.png", "<{$smarty.const.BASE_URL}>img/num_d_5.png", "<{$smarty.const.BASE_URL}>img/num_d_6.png", "<{$smarty.const.BASE_URL}>img/num_d_7.png", "<{$smarty.const.BASE_URL}>img/num_d_8.png", "<{$smarty.const.BASE_URL}>img/num_d_9.png" ]
        };
        var result = true;
        var initial = {
          player:<{$player}>, 
          enemy: {
            name: "<{$enemy.card_name}>",
            img: "<{$smarty.const.IMG_URL}>enemy/enemy_<{$enemy.enemy_id}>.jpg",
            max: "<{$data.log.enemy_max}>",
            current: "<{$data.log.enemy_cur}>"
          },
        }

        var playerSkillData = <{$playerSkillData}>

        var enemySkillData = <{$enemySkillData}>;

        var turn = <{$turn}>;

        boss.main.init(
          canvasID,
          fileName,
          initial,
          playerSkillData,
          enemySkillData,
          turn,
          imageLoadComplete,
          contentsComplete,
          <{$divNum}>
        );

        var el = document.getElementById( "skip" );
        el.addEventListener("click", function(){
            <{if $data.result == 2}>
                location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>EvStages/comp";
            <{else}>
                location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}>EvStages/scene";
            <{/if}>
        }, false);
     };

    </script>
</html>

