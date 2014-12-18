<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
  padding: 0px;
  margin: 0px;
  background-image: url('".$url."/img/synth_up_bg.png');
  text-align:center;
  height:400px;
  overflow: hidden;
}
#mainCanvas {
  background-image: url('".$url."/img/synth_up_bg.png');
  margin: auto;
  text-align: left;
  overflow: hidden;
}
";
?>
