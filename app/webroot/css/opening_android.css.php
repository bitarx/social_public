<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
    background-color:#000000;
}

.tutorial1 {
}
.slider {
    position: relative;
    width:320px;
    height:400px;
    left:11px;
}

.btnStart {
    position: relative;
    top: 55px;
    left: 16px;
    height: 50px;
}
.btnStartNiji {
    position: relative;
    top: 55px;
    left: 15px;
    height: 50px;
}
.strStart {
    position: absolute;
    top: 8px;
    left: 86px;
    font-size: 20px
}
.opening_text {
    width:320px;
}
.btnStrongL {
    width:310px;
}
";
?>
