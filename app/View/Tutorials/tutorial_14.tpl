<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/config.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/ui.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/nineleap.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/enchant/memory.enchant.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/game.js"></script>
    <style type="text/css">
      body {
          margin: 0;
          background-color: #000;
      }
    </style>
    <script type="text/javascript">

// 背景、登場人物の画像を定義する
背景画像 = {
  '学校': IMG_URL + 'tutorial/scene_0_1.jpg',
}
登場人物 = {
}


// セーブ用のゲームIDを設定する
// 9leapのデータベースに保存する場合は、
// 9leapの「ゲームID」(9leapにアップロードしたゲームのURLの末尾の数字)を設定する
GAME_ID = 'adv001';

start = {
  'シーン': 'start',
  '背景画像': ['学校', 640, 800],
  '選択肢': ['<{$row.tutorial_words}>','次へ', 'Tutorials/tutorial_15'],
}




    </script>
  </head>
  <body>
  </body>
</html>
