'use strict';
var boss = boss || {};
boss.utils = ( function() {

  /**
  * 初期化
  */
  function getTextWidth( style, text, maxWidth ) {

    var temp = new createjs.Text( "", style );
    var temp_str = "";
    var arr = text.split("");
    var lineCount = 1;
    var len = arr.length;
    for( var i = 0; i < len; i++ ) {
      temp.text += arr[ i ];
      var b = temp.getBounds();

      if( maxWidth <= b.width ) {
        lineCount++;
        temp.text += "\r\n";
        temp_str += temp.text;
        temp.text = "";

      }

    }
    temp_str += temp.text;
    return temp_str
  }

  /**
  *
  */
  function getPercentage( max, current, offset ) {
    var par = current / max * ( offset / 100 ) * 100;
    return par <= 0? 0: par;
  }


  var exports = {};
  exports.getTextWidth = getTextWidth;
  exports.getPercentage = getPercentage;

  return exports;

}());
