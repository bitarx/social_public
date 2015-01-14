<?php 
header('Content-Type: text/css; charaset=utf-8'); 
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
body {
    background-image: url('" . $url . "/img/tutorial/opening.png');
    background-color:#000000;
    background-position:left top;
    background-repeat:no-repeat;
    -moz-background-size:100% auto;
    background-size:100% auto;
}

.tutorial1 {
}
.slider {
    position: relative;
    width:640px;
    height:800px;
    top:0px;
    left:-5px;
}

.btnStart {
    position: relative;
    top: 8px;
    left: 95px;
    height: 100px;
}
.btnStartNiji {
    position: relative;
    top: -35px;
    left: 15px;
    height: 50px;
}
.strStart {
    position: absolute;
    top: 10px;
    left: 120px;
    font-size: 28px
}
.opening_text {
    width:640px;
}
.btnStrongL {
    width:275px;
}
";
?>
