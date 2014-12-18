<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
html, body {
  height: 960px;
  background-color:#000;
}
html, body {
  padding: 0px;
  margin: 0px;
  overflow: hidden;
}
ul {
  padding: 0;
  margin: 0;
}
li {
  margin: 0;
  padding: 0;
  list-style-position:outside;
}

#main {
  position: relative;
  overflow: hidden;
  margin: auto;
  width: 320px;
  height: 480px;
  font-size: 16px;
  color: #FFF;
}
#nameArea {
  color: #000;
  margin: 0px;
  background-repeat: no-repeat;
  background-size: 150px 24px;
  position: absolute;
  bottom: 130px;
  left: 10px;
  width: 150px;
  height: 24px;
  padding: 0px 10px;
  pointer-events: none;
}
#textArea {
  padding: 0px;
  margin: 0px;
  background-image: url( '".$url."/img/scene/textarea.png' );
  background-repeat: no-repeat;
  background-size: 300px 75px;
  position: absolute;
  top:400px;
  bottom: 30px;
  left: 10px;
  width: 300px;
  height: 75px;
  padding: 10px;
  font-size: 22px;
  pointer-events: none;
}

/*  */
#listContainer {
  display: none;
  position: absolute;
  top: 0px;
  width: 320px;
  height: 480px;
  padding-top: 10px;
}
#listContainer li {
  position: relative;
  margin-left: 10px;
  margin-top: 30px;
  width: 300px;
  height: 50px;
}
#listContainer li p {
  font-size: 20px;
  position: absolute;
  padding: 0px;
  margin: 0px 20px;
  top: 50%;
  bottom: 50%;
  margin-top: -15px;
}
/* */

#mainCanvas {
  width: 320px;
  height: 480px;
}
.userSelectNone {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
.touchCalloutNone {
  -moz-touch-callout: none;
  -webkit-touch-callout: none;
  -ms-touch-callout: none;
}

.nextSign {
    position: absolute;
    right: 10%;
}
";
