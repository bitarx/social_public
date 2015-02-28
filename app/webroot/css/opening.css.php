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
.opening_text {
    width:310px;
}
.btnStrongL {
    width:275px;
}
";
?>
