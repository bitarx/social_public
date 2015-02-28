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
    left:-4px;
}

.btnStart {
    position: relative;
    top: 0px;
    left: 8px;
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
    top: 3px;
    left: 75px;
    font-size: 20px
}
.opening_text {
    width:300px;
}
.btnStrongL {
    width:285px;
}
";
?>
