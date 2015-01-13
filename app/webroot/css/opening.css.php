<?php 
header('Content-Type: text/css; charaset=utf-8'); 
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
    background-image: url('" . $url . "/img/tutorial/opening.png');
    background-color:#000000;
    background-position:left top;
    background-repeat:no-repeat;
    -moz-background-size:50% auto;
    background-size:50% auto;
}

.tutorial1 {
}
.slider {
    position: relative;
    width:320px;
    height:400px;
    top:0px;
    left:-5px;
}

.btnStart {
    position: relative;
    top: 5px;
    left: 15px;
    height: 50px;
}
.btnStartNiji {
    position: relative;
    top: -35px;
    left: 15px;
    height: 50px;
}
.strStart {
    position: absolute;
    top: 7px;
    left: 80px;
    font-size: 18px
}
.opening_text {
    width:320px;
}
.btnStrongL {
    width:275px;
}
";
?>
