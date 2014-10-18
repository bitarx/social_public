<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.1,minimum-scale=0.5, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/config.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/ui.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/nineleap.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/memory.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/game.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>
    <style type="text/css">
      body {
           margin: 0;
           background-color: #000;
      }
    </style>
    <script type="text/javascript">

// 背景、登場人物の画像を定義する
背景画像 = {
  '学校': BASE_URL + 'File/outimage?size=<{$questId}>&dir=scene&target=<{$data.enemy_id}>',
  'エントランス': IMG_URL + 'bg/entrance.png',
  '教室1': IMG_URL + 'bg/classroom.png',
  '廊下': IMG_URL + 'bg/passage.png',
  'トイレ': IMG_URL + 'bg/toilet.png',
  'ゲームオーバー': IMG_URL + 'end.png'
}
登場人物 = {
  'まゆ通常': IMG_URL + 'chara/chara1_Normal.png',
}


// セーブ用のゲームIDを設定する
// 9leapのデータベースに保存する場合は、
// 9leapの「ゲームID」(9leapにアップロードしたゲームのURLの末尾の数字)を設定する
GAME_ID = 'adv002';

start = {
  'シーン': 'start',
  '背景画像': ['学校', 640, 800],
  '選択肢': ['<{$data.after_win_words}>','<{$str}>', '<{$next}>'],
}

function next()
{
}




    </script>
  </head>
  <body>
  </body>
</html>
