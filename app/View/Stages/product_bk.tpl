<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ボスバトル</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/enemybattle.css">
    </head>
    <body id="body">
        <canvas id="mainCanvas" height="832" width="640"></canvas>
        <div id="skip">skip###########</div>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/preloadjs-0.4.1.min.js"></script>

    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.utils.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.stocker.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.loader.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.view.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/boss.main.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {
            console.log("imageLoadComplete");
            setTimeout("boss.main.skip()", 3200);
        }
        var contentsComplete = function() {
          console.log("contentsComplete");
            var element = document.getElementById("body");
            element.addEventListener("click", function(){
                <{if $data.result == 2}>
                    location.href = "comp";
                <{else}>
                    location.href = "scene";
                <{/if}>
            });
        }

        var canvasID = "mainCanvas";
        var fileName = {
          bg: "<{$smarty.const.BASE_URL}>img/clear.png", //背景
          enemyHPProgBase: "<{$smarty.const.BASE_URL}>img/hp_prog_base.png",
          enemyHPProgRed: "<{$smarty.const.BASE_URL}>img/hp_prog_red.png",
          playerHPProgBase: "<{$smarty.const.BASE_URL}>img/progress_base.png",
          playerHPProgBar: "<{$smarty.const.BASE_URL}>img/progress_yellow.png",
          fukidashiMiddle: "<{$smarty.const.BASE_URL}>img/fukidashi_middle.png",
          fukidashiLeftUnder: "<{$smarty.const.BASE_URL}>img/fukidashi_left_under.png",
          particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
          particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
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
          player: [
            {
              img: "<{$smarty.const.IMG_URL}>card/card_<{$data.log.card_id_1}>.jpg",
              max: "<{$data.log.card_id_1_max}>",
              current:"<{$data.log.card_id_1_cur}>" 
            },

            {
              img: "<{$smarty.const.IMG_URL}>card/card_<{$data.log.card_id_2}>.jpg",
              max: "<{$data.log.card_id_2_max}>",
              current: "<{$data.log.card_id_2_cur}>"
            },

            {
              img: "<{$smarty.const.IMG_URL}>card/card_<{$data.log.card_id_3}>.jpg",
              max: "<{$data.log.card_id_3_max}>",
              current: "<{$data.log.card_id_3_cur}>",
            },

            {
              img: "<{$smarty.const.IMG_URL}>card/card_<{$data.log.card_id_4}>.jpg",
              max: "<{$data.log.card_id_4_max}>",
              current: "<{$data.log.card_id_4_cur}>"
            },

            {
              img: "<{$smarty.const.IMG_URL}>card/card_<{$data.log.card_id_5}>.jpg",
              max: "<{$data.log.card_id_5_max}>",
              current: "<{$data.log.card_id_5_cur}>"
            }
          ],
          enemy: {
            name: "<{$enemy.card_name}>",
            img: "<{$smarty.const.IMG_URL}>enemy/enemy_<{$enemy.enemy_id}>.jpg",
            max: "<{$data.log.enemy_max}>",
            current: "<{$data.log.enemy_cur}>"
          },
        }

        var playerSkillData = [ { words:"キノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きXXXXX", type:1 }, null, { words:"キノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きキノコ大好きXXXXX", type:2 }, null, { words:"キノコ食べ過ぎ", type:3 } ];
        //var playerSkillData = [ null, null, null, null, null ];

        var enemySkillData = { words:"はじめまして! クッパです!!", type:4 };

        var turn = "<{$turn}>";
<{*
        var turn = [
          {
            enemyHP: [ 45000, 40000, 35000, 30000, 25000 ],
            playerHP: [ 8000, 0, 0, 3000, 6000 ]
          },
          {
            enemyHP: [ 20000, 15000, 10000, 5000, 100 ],
            playerHP: [ 7000, 0, 0, 2500, 4000 ]
          },
          {
            enemyHP: [ 0, 0, 0, 0, 0 ],
            playerHP: [ 1000, 0, 0, 1000, 1000 ]
          },
          {
            enemyHP: [ 0, 0, 0, 0, 0 ],
            playerHP: [ 1000, 0, 0, 1000, 1000 ]
          }
        ]
*}>
        boss.main.init(
          canvasID,
          fileName,
          initial,
          playerSkillData,
          enemySkillData,
          turn,
          imageLoadComplete,
          contentsComplete
        );

        var el = document.getElementById( "skip" );
        el.addEventListener("click", function(){
            <{if $data.result == 2}>
                location.href = "comp";
            <{else}>
                location.href = "scene";
            <{/if}>
//          boss.main.skip();
        }, false);
     };

    </script>
</html>

<{*
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>進化合成</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/evolution.css">
    </head>
    <body>
        <canvas id="mainCanvas" height="832" width="640"></canvas>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/tweenjs-0.5.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/evolution.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {

        }
        var contentsComplete = function() {
            <{if $data.result == 2}>
                location.href = "comp";
            <{else}>
                location.href = "scene";
            <{/if}>
        }
        evolution.init(
          "mainCanvas",
          {
            bg: "<{$smarty.const.BASE_URL}>img/bg.jpg", //背景
            card1: "<{$smarty.const.BASE_URL}>img/miku.jpg", //合成元カード
            card2: "<{$smarty.const.BASE_URL}>img/miku.jpg",　//合成カード
            cardResult: "<{$smarty.const.BASE_URL}>img/miku_v02.jpg",　//合成後カード
            cardGrow: "<{$smarty.const.BASE_URL}>img/cardGlow.png",
            particle001: "<{$smarty.const.BASE_URL}>img/particle001.png",
            particle002: "<{$smarty.const.BASE_URL}>img/particle002.png",
            glowline: "<{$smarty.const.BASE_URL}>img/glowline.png"
          },
          imageLoadComplete,
          contentsComplete
        );
      };

    </script>
</html>
*}>
