<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
  padding: 0px;
  margin: 0px;
  height:400px;
}


/** Loading */
#loading {
    width: 96px; /* gif画像の幅 */
    height: 96px; /* gif画像の高さ */
    margin: -34px 0 0 -68px; /* gif画像を画面中央に */
    padding: 20px; /* gif画像を大きく */
    opacity: 0.5; /* 透過させる */
    border-radius: 15px; /* 丸角 */
    position: fixed; /* gif画像をスクロールさせない */
    left: 25%; /* gif画像を画面横中央へ */
    top: 50%; /* gif画像を画面縦中央へ */
}
";
