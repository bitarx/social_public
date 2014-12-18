<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
  padding: 0px;
  margin: 0px;
  height:400px;
}

#mainCanvas {
  background-image: url('".$url."/img/synth_evol_bg.png');
  overflow: hidden;
}
";
