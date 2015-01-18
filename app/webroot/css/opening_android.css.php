<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
    background-image: url('" . $url . "/img/tutorial/opening.png');
    background-color:#000000;
    background-position:center top;
    background-repeat:no-repeat;
    -moz-background-size:100% auto;
    background-size:100% auto;
}

.tutorial1 {
}
.slider {
    position: relative;
    width:320px;
    height:400px;
    top:-370px;
    left:-20px;
}

.btnStart {
    position: relative;
    top: 55px;
    left: 10px;
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
    left: 90px;
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
