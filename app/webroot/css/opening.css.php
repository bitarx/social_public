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
    width:300px;
    height:400px;
    top:0px;
    left:-4px;
}

.btnStart {
    position: relative;
    top: 5px;
    left: 8px;
    height: 50px;
}
.btnStartMovie {
    position: relative;
    top: 30px;
    left: 8px;
    height: 50px;
}
.playNotice {
    position: relative;
    top: 25px;
    color: #fff;
}
.btnStartNiji {
    position: relative;
    top: 0px;
    left: 15px;
    height: 50px;
}
.strStart {
    position: absolute;
    top: 7px;
    left: 80px;
    font-size: 18px
}
.strStartMovie {
    position: absolute;
    top: 7px;
    left: 118px;
    font-size: 18px;
    color:#fff;
}
.opening_text {
    width:310px;
}
.btnStrongL {
    width:275px;
}
";
?>
