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

// 背景画像を定義する
背景画像 = {
  'main': BASE_URL + 'File/outimage?size=<{$questId}>&dir=scene&target=<{$data.enemy_id}>',
}

start = {
  'シーン': 'start',
  '背景画像': ['main', 640, 800],
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
