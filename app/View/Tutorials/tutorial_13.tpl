<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ボスバトル</title>
        <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/enemybattle.css">
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
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>

    <script type="text/javascript">
      window.onload = function() {
        var imageLoadComplete = function() {
            setTimeout("boss.main.skip()", 3200);
        }
        var contentsComplete = function() {
            var element = document.getElementById("body");
            element.addEventListener("click", function(){
                    location.href = "tutorial_14";
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
              img: "<{$smarty.const.IMG_URL}>tutorial/card_s_13.jpg",
              max: "<{$data.card_id_1_max}>",
              current:"<{$data.card_id_1_cur}>" 
            },

            {
              img: "<{$smarty.const.IMG_URL}>tutorial/card_s_43.jpg",
              max: "<{$data.card_id_2_max}>",
              current: "<{$data.card_id_2_cur}>"
            },

            {
              img: "<{$smarty.const.IMG_URL}>tutorial/card_s_37.jpg",
              max: "<{$data.card_id_3_max}>",
              current: "<{$data.card_id_3_cur}>",
            },

            {
              img: "<{$smarty.const.IMG_URL}>tutorial/card_s_46.jpg",
              max: "<{$data.card_id_4_max}>",
              current: "<{$data.card_id_4_cur}>"
            },

            {
              img: "<{$smarty.const.IMG_URL}>tutorial/card_s_55.jpg",
              max: "<{$data.card_id_5_max}>",
              current: "<{$data.card_id_5_cur}>"
            }
          ],
          enemy: {
            name: "初川ゆうこ",
            img: "<{$smarty.const.IMG_URL}>tutorial/enemy_0.png",
            max: "<{$data.enemy_max}>",
            current: "<{$data.enemy_cur}>"
          },
        }

        var playerSkillData = [ { words:"【アイドルマスタリー】 自分の攻撃力を中アップ", type:1 }, null, { words:"【ジューンブライド】 自分の攻撃力を小アップ", type:1 }, null, { words:"【四十九日の近い】 自分の防御力を小アップ", type:1 } ];
        //var playerSkillData = [ null, null, null, null, null ];

        var enemySkillData = { words:"【オフィスラブ】 相手全体の防御力を中ダウン", type:4 };

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
                location.href = "tutorial_14";
//          boss.main.skip();
        }, false);
     };

    </script>
</html>

