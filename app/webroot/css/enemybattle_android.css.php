<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
  padding: 0px;
  margin: 0px;
  background-image: url('".$url."/img/synth_evol_bg.png');
  height:980px;
  overflow: hidden;
}

#mainCanvas {
  background-image: url('".$url."/img/synth_evol_bg.png');
  overflow: hidden;
  margin: auto;
  text-align: left;
  width: 320px;
  height: 430px;
}


.skip {
    color:#E6E6FA;
    font-size: 30px;
    text-align:right;
}
";
