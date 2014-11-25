'use strict';
var reinforce = (function() {
  var _canvas;
  var _stage;
  var _circle;

  //Img
  var _img = {
    cardGrow: "",
 }

  //Bitmap
  var _bm = {
    bg: "",
    sacrificeList: "",
    sacrificeGlowBMList: "",
    cardResult: "",
    cardResultBM: "",
    cardResultBMBrightness: "",
    cardGrow: "",
    particle001: "",
    particle002: "",
    cardResultGrowBM: "",

    synthProgBase: "",
    synthProgRed: "",
    levelup: ""
  }

  //Shape
  var _shape = {
    cardResultGlossLine:""
  }

  var _fileName = {
    bg: "",
    sacrificeList: "",
    cardResult: "",
    cardGrow: "",
    particle001: "",
    particle002: "",

    synthProgBase: "",
    synthProgRed: "",
    levelup: ""
  }

  var _exp;

  // 開始経験値
  var _startExp;

  //Matrix
  var _card1Matrix;
  var _card2Matrix;

  //callback
  var _loadCompleteCallback;
  var _contentsCompleteCallback;

  /**
  * 初期化
  */
  function init(canvasID, fileName, startExp, exp, loadCompleteCallback, contentsCompleteCallback, divNum ) {

    _canvas = document.getElementById(canvasID);

    // ios
    if ( 2 == divNum ) {
        window.innerWidth = 640;
    }
    _canvas.style.width = window.innerWidth / divNum + 'px';
    _canvas.style.height = Math.floor( _canvas.style.width * 1.3 )

    _stage = new createjs.Stage(_canvas);
    var matrix = _stage.getMatrix();
    matrix.translate(_canvas.width >> 1, _canvas.height >> 1);
    matrix.decompose(_stage);

    var bg = new Image();
    bg.onload = function() {
      _bm.bg = new createjs.Bitmap( this );
      _bm.bg.regX = _bm.bg.image.width / 2; _bm.bg.regY = _bm.bg.image.height / 2;
      _bm.bg.x = 0;
      _bm.bg.y = 0;
//      _stage.addChild( _bm.bg );
      _stage.update();
      bg.onload = null;
      bg = null;
      _loadImage( function(){
        _stage.update();
        loadCompleteCallback();
        setTimeout(function(){
          _startContents()
      }, 200 );
      });
    }

    _fileName.bg = fileName.bg;
    _fileName.sacrificeList = fileName.sacrificeList;
    _fileName.cardResult = fileName.cardResult;
    _fileName.cardGrow = fileName.cardGrow;
    _fileName.particle001 = fileName.particle001;
    _fileName.particle002 = fileName.particle002;
    _fileName.glowline = fileName.glowline;

    _fileName.synthProgBase = fileName.synthProgBase;
    _fileName.synthProgRed = fileName.synthProgRed;
    _fileName.levelup = fileName.levelup;

    _contentsCompleteCallback = contentsCompleteCallback;

    bg.src = _fileName.bg;

    _exp = exp;
    _startExp = startExp;

  }

  /**
  * アニメーションスタート
  */
  function _startContents() {
    _animationStep01();

    createjs.Ticker.setFPS( 60 );
    createjs.Ticker.addEventListener("tick", _stage);
  }



  function _animationStep01() {

    var brightness;

    createjs.Tween.get( _bm.cardResult ).to( {y: -150}, 300, createjs.Ease.backOut );

    var len = _fileName.sacrificeList.length;
    setTimeout( function(){
      for( var i = 0; i < len; i++ ) {
        var card = _bm.sacrificeList[ i ];
        var num = card.num;
        var y = ( Math.floor( num / 5 ) * 145 ) + 170;
        createjs.Tween.get( card ).wait( i * 30 ).to( {y: y}, 300, createjs.Ease.backOut );
      }

    }, 200 );

    setTimeout( function(){
      _shape.cardResultGlossLine.alpha = 0.6;
      _shape.cardResultGlossLine.x = -400;
      createjs.Tween.get( _shape.cardResultGlossLine ).to( { x: 1600 }, 300, createjs.Ease.liner );
      createjs.Tween.get( _shape.cardResultGlossLine ).to( { alpha: 0.2 }, 200, createjs.Ease.liner );
      createjs.Tween.get( _bm.cardResultGrowBM ).to( { alpha: 1 }, 200, createjs.Ease.sineOut );
    }, 1000 );

    setTimeout( function(){
      for( var i = 0; i < len; i++ ) {
        var card = _bm.sacrificeList[ i ];
        createjs.Tween.get( card ).wait( i * 30 ).to( {x: 0, y: -130}, 600, createjs.Ease.backIn );
      }
      createjs.Tween.get( _bm.cardResult ).to( {y: -130}, 500, createjs.Ease.sineOut );
      brightness = _brightness();
      _stage.addChild( brightness );

      createjs.Tween.get( brightness ).wait( 500 ).to( {alpha: 1}, 500, createjs.Ease.sineOut );

    }, 1500 );

    setTimeout( function(){
      _animationStep02( brightness );
    }, 2800 );

  }

  function _animationStep02( brightness ) {

    _bm.synthProgBase.visible = true;
    _bm.synthProgRed.visible = true;

    _bm.synthProgBase.scaleX = _bm.synthProgBase.scaleY = 0.5;

    var len = _fileName.sacrificeList.length;
    for( var i = 0; i < len; i++ ) {
      _bm.sacrificeList[ i ].visible = false;
    }


    _bm.cardResult.y = 0;

    createjs.Tween.get( brightness ).to( { alpha: 0 }, 500, createjs.Ease.sineOut );

    setTimeout( function(){
      var scale = ( _stage.canvas.width - 200 ) / 700;//scale
      createjs.Tween.get( _bm.cardResult ).to( { scaleX: scale, scaleY: scale }, 500, createjs.Ease.backOut );
      createjs.Tween.get( _bm.synthProgBase ).to( { scaleX: 1, scaleY: 1 }, 500, createjs.Ease.backOut );
    }, 10 );

    setTimeout( function(){
      _startLevelUPAction( update );
    }, 500 );


    var update = function() {
      var d = 0;
      setInterval( function() {
        _bm.cardResult.y = Math.sin( d ) * 5;
        _bm.cardResultGrowBM.alpha = ( Math.sin( d ) * 0.4 ) + 0.8;
        d += 0.05;
      }, 18 );

      setInterval( function() {
        _shape.cardResultGlossLine.alpha = 0.6;
        _shape.cardResultGlossLine.x = -400;
        createjs.Tween.get( _shape.cardResultGlossLine ).to( { x: 1600 }, 300, createjs.Ease.liner );
        createjs.Tween.get( _shape.cardResultGlossLine ).to( { alpha: 0.2 }, 200, createjs.Ease.liner );
      }, 3000 );

      _startParticle();
      _contentsCompleteCallback();
    }
  }

  /**
  * 合成用マスク追加
  */
  function _setmask() {
    var shape = new createjs.Shape();
    var g = shape.graphics;
    g.beginFill("#ff0000");
    g.drawRect( 0, 0, _stage.canvas.width/2, _stage.canvas.height);
    g.endFill();
    _regCenter( shape, _stage.canvas.width, _stage.canvas.height );
    shape.x = 0, shape.y = 0;
    _bm.card1.mask = shape;
  }

  /**
  * 合成結合部分アニメーション
  */
  function _setGlowLine() {
    _bm.glowline.alpha = 0;
    _bm.glowline.visible = true;
    var flg = false;
    setInterval( function() {
      if(flg) {
        _bm.glowline.scaleX = 0.8;
        flg = false;
      } else {
        _bm.glowline.scaleX = 1;
        flg = true;
      }
    }, 50 );
    createjs.Tween.get( _bm.glowline ).to( { alpha: 1 }, 100, createjs.Ease.sineOut );
  }

  /**
  * 画面白飛ばし
  */
  function _brightness() {
    var shape = new createjs.Shape();
    var g = shape.graphics;
    g.beginFill("#ffffff");
    g.drawRect( 0, 0, _stage.canvas.width, _stage.canvas.height);
    g.endFill();
    shape.alpha = 0;
    _regCenter( shape, _stage.canvas.width, _stage.canvas.height );
    shape.x = 0, shape.y = 0;
    _stage.addChild( shape );
    return shape;
  }

  /**
  * パーティクルスタート
  */
  function _startParticle() {
    function emit() {
      var len = 2;
      for(var i = 0; i < len; i++ ) {
        var par;
        if( Math.floor( Math.random() * 2 ) == 0 ) {
          par = _bm.particle001.clone();
        } else {
          par = _bm.particle002.clone();
        }
        par.x = ( Math.random() * _stage.canvas.width ) - ( _stage.canvas.width / 2 );
        par.y = ( Math.random() * _stage.canvas.height ) - ( _stage.canvas.height / 2 );
        par.alpha = 0;
        var wait = Math.random() * 300;
        var aspeed = ( Math.random() * 400 ) + 100;
        var yspeed = ( Math.random() * 500 ) + 300;
        var targetY = ( Math.random() * 10 );
        par.scaleX = par.scaleY = ( Math.random() * 0.7 ) + 0.5;
        par.rotation = Math.random() * 360;
        createjs.Tween.get( par ).wait( wait ).to( { alpha: 1 }, aspeed, createjs.Ease.sineOut );
        createjs.Tween.get( par ).wait( wait ).to( { y: par.y }, yspeed, createjs.Ease.linear )
        .call(function(){
          createjs.Tween.get( this ).to( { alpha: 0 }, 300, createjs.Ease.sineOut );
        });
        //
        _stage.addChild( par );
      }
    }
    setInterval( emit, 200 );
  }


  function _loadSacrificeList( callback ) {
    var len = _fileName.sacrificeList.length;
    var count = 0;
    var loadComplete = function() {
      count++;
      if( count >= ( len ) ) {
        _stage.update();
        callback();
      }
    }

    var initialize = function( cardimg ) {
      var num = cardimg.dataset.num * 1;
      var cardBM = new createjs.Bitmap( _getBitmapCapture( cardimg, 0.5, 0.5, "image/jpeg" ) );
      var glowBM = new createjs.Bitmap( _img.cardGrow );

      cardBM.scaleX = cardBM.scaleY = 0.6;
      glowBM.scaleX = glowBM.scaleY = 0.3;
      glowBM.alpha = 0;

      var card = new createjs.Container();
      card.addChild( glowBM );
      card.addChild( cardBM );
      _bm.sacrificeList[ num ] = card;

      var maxColumn = ( ( num - 5 ) < 0 )? ( ( ( len / 5 ) > 1 )? 5: len ) : ( len - 5 ) ;
      card.x = ( _stage.canvas.width * ( ( (num % 5 ) + 0.5 ) / maxColumn ) ) - ( _stage.canvas.width / 2 );
      card.y = ( Math.floor( num / 5 ) * 145 ) + 500;
      card.num = num;

      _regCenter( cardBM, cardBM.image.width, cardBM.image.height );
      _regCenter( glowBM, glowBM.image.width, glowBM.image.height );
      _stage.addChild( card );
      loadComplete();
    }

    var load = function() {
      _bm.sacrificeList = new Array();
      for( var i = 0; i < len; i++ ) {
        var sacrifice = new Image();
        sacrifice.onload = function() {
          initialize( this );
        };
        sacrifice.dataset.num = i;
        sacrifice.src = _fileName.sacrificeList[ i ];
      }
    };

    load();
  };


  function _startLevelUPAction( callback ) {

    var levelUPLen = Math.floor( _exp / 100 );
    var levelUPCount = 0;
    var expNum = _exp % 100;

    var start = function() {

      var lvup = _bm.levelup.clone();
      lvup.alpha = 0;
      lvup.y = 100;
      _stage.addChild( lvup );

      var scale1 = ( _stage.canvas.width - 120 ) / 700;//scale;
      var scale2 = ( _stage.canvas.width - 200 ) / 700;//scale;

      _bm.synthProgRed.scaleX = _startExp;
      if( levelUPLen == levelUPCount ) {
        if (0 < levelUPLen) {
            _bm.synthProgRed.scaleX = 0;
        }
        createjs.Tween.get( _bm.synthProgRed ).to({scaleX: ( 97.8 / 100 ) * expNum }, 1500, createjs.Ease.sineInOut);

        callback();
      } else if( levelUPLen > levelUPCount ) {
        if (0 < levelUPCount) {
            _bm.synthProgRed.scaleX = 0;
        }
        createjs.Tween.get( _bm.synthProgRed ).to({scaleX:97.8}, 500, createjs.Ease.liner)
        .call( start );

        createjs.Tween.get( _bm.cardResult ).to( { scaleX: scale1, scaleY: scale1 }, 200, createjs.Ease.sineIn ).to({ scaleX: scale2, scaleY: scale2 }, 300, createjs.Ease.sineOut);
        createjs.Tween.get( _bm.cardResultBMBrightness ).to( { alpha: 1 }, 200, createjs.Ease.sineIn ).to({ alpha: 0 }, 300, createjs.Ease.sineInOut);

        createjs.Tween.get( lvup ).to({alpha:1}, 200, createjs.Ease.sineIn)
        .to({alpha:0}, 1000, createjs.Ease.sineOut);
        createjs.Tween.get( lvup ).to({y: 100 - 350, scaleX: 1.5, scaleY: 1.5}, 2000, createjs.Ease.sineOut);

        levelUPCount++;
      }


    }
    start();
  };

  /**
  * 画像読込
  */
  function _loadImage( callback ) {
    var cardScale = ( ( _stage.canvas.width / 2 ) - 70 ) / 320;

    var levelup = new Image();
    levelup.onload = function() {
      _bm.levelup = new createjs.Bitmap( levelup );
      var w = _bm.levelup.image.width;
      var h = _bm.levelup.image.height;
      _bm.levelup.scaleX = _bm.levelup.scaleY = 1.2;
      _regCenter( _bm.levelup, w, h );
      _bm.levelup.x = 0; _bm.levelup.y = 0;
    }

    var synthProgRed = new Image();
    synthProgRed.onload = function() {
      _bm.synthProgRed = new createjs.Bitmap( synthProgRed );
      var w = _bm.synthProgRed.image.width;
      var h = _bm.synthProgRed.image.height;
      _bm.synthProgRed.regY = h / 2;//reg
      _bm.synthProgRed.x = -195; _bm.synthProgRed.y = 300;
      _bm.synthProgRed.scaleX = _startExp;
      _bm.synthProgRed.visible = false;
      _stage.addChild( _bm.synthProgRed );
      levelup.src = _fileName.levelup;
      synthProgRed.visible = false;
    }

    var synthProgBase = new Image();
    synthProgBase.onload = function() {
      _bm.synthProgBase = new createjs.Bitmap( synthProgBase );
      var w = _bm.synthProgBase.image.width;
      var h = _bm.synthProgBase.image.height;
      _regCenter( _bm.synthProgBase, w, h );
      _bm.synthProgBase.x = 0; _bm.synthProgBase.y = 300;
      _bm.synthProgBase.visible = false;
      _stage.addChild( _bm.synthProgBase );
      synthProgRed.src = _fileName.synthProgRed;
    }

    var cardResult = new Image();
    cardResult.onload = function() {
      _bm.cardResultBM = new createjs.Bitmap( cardResult );
      var w = _bm.cardResultBM.image.width;
      var h = _bm.cardResultBM.image.height;
      _bm.cardResultBM.cache(0, 0, w, h);
      _regCenter( _bm.cardResultBM, w, h );
      _bm.cardResultBM.x = 0; _bm.cardResultBM.y = 0;
      _bm.cardResult.addChild( _bm.cardResultBM );

      //glossLine
      _shape.cardResultGlossLine = _getGlossline( w, h );
      _shape.cardResultGlossLine.mask = _getMask( w, h );
      _shape.cardResultGlossLine.x = -600;
      _bm.cardResult.addChild( _shape.cardResultGlossLine );

      _bm.cardResultBMBrightness = _bm.cardResultBM.clone();
      var matrix = new createjs.ColorMatrix();
      _bm.cardResultBMBrightness.filters = [
        new createjs.ColorMatrixFilter( matrix.adjustBrightness(220) )
      ];
      _bm.cardResultBMBrightness.cache(0, 0, w, h);
      _bm.cardResult.addChild( _bm.cardResultBMBrightness );
      _bm.cardResultBMBrightness.alpha = 0;

      _bm.cardResult.x = 0, _bm.cardResult.y = 700;
      _bm.cardResult.scaleX = ( _stage.canvas.width - 300 ) / _bm.cardResultBM.image.width, _bm.cardResult.scaleY = _bm.cardResult.scaleX;//scale
      _stage.addChild( _bm.cardResult );

      cardResult.onload = null;
      cardResult = null;

      _bm.cardResultGrowBM.alpha = 0;

      _loadSacrificeList( callback );
      synthProgBase.src = _fileName.synthProgBase;
    }

    var cardGrow = new Image();
    cardGrow.onload = function() {
      cardGrow.onload = null;
      _img.cardGrow = cardGrow;

      _bm.card1GrowBM = new createjs.Bitmap( cardGrow );
      _bm.card2GrowBM = _bm.card1GrowBM.clone();
      _bm.cardResultGrowBM = _bm.card1GrowBM.clone();
      _regCenter( _bm.card1GrowBM, _bm.card1GrowBM.image.width, _bm.card1GrowBM.image.height );
      _regCenter( _bm.card2GrowBM, _bm.card2GrowBM.image.width, _bm.card2GrowBM.image.height );
      _regCenter( _bm.cardResultGrowBM, _bm.cardResultGrowBM.image.width, _bm.cardResultGrowBM.image.height );
      _bm.card1GrowBM.alpha = 0;
      _bm.card2GrowBM.alpha = 0;
      _bm.card1GrowBM.x = 0; _bm.card1GrowBM.y = 0;
      _bm.card2GrowBM.x = 0; _bm.card2GrowBM.y = 0;
      _bm.cardResultGrowBM.x = 0; _bm.cardResultGrowBM.y = 0;
      _bm.cardResultGrowBM.scaleX = 1.96;
      _bm.cardResultGrowBM.scaleY = 2.05;
      _bm.card1 = new createjs.Container();
      _bm.card1.addChild( _bm.card1GrowBM );
      _bm.card2 = new createjs.Container();
      _bm.card2.addChild( _bm.card2GrowBM );
      _bm.cardResult = new createjs.Container();
      _bm.cardResult.addChild( _bm.cardResultGrowBM );

      cardResult.src = _fileName.cardResult;
    }
    cardGrow.src = _fileName.cardGrow;

    var particle001 = new Image();
    particle001.onload = function() {
      _bm.particle001 = new createjs.Bitmap( particle001 );
      _bm.particle001.cache(0, 0, _bm.particle001.image.width, _bm.particle001.image.height);
      particle001.onload = null;
      particle001 = null;
    }
    particle001.src = _fileName.particle001;

    var particle002 = new Image();
    particle002.onload = function() {
      _bm.particle002 = new createjs.Bitmap( particle002 );
      _bm.particle002.cache(0, 0, _bm.particle002.image.width, _bm.particle002.image.height);
      particle002.onload = null;
      particle002 = null;
    }
    particle002.src = _fileName.particle002;

  }

  function _getGlossline( w, h ) {
    var shape = new createjs.Shape();
    var g = shape.graphics;
    g.beginFill("#ffffff");
    g.drawRect( -((w * 0.1) * 4), -(h / 2), w * 0.1, h * 3);
    g.drawRect( 5, -(h / 2), w * 0.3 , h * 3);
    g.endFill();
    shape.alpha = 0.6;
    _regCenter( shape, w, h );
    shape.rotation = 45;
    return shape;
  }

  function _getMask( w, h ) {
    var shape = new createjs.Shape();
    var g = shape.graphics;
    g.beginFill("#ff0000");
    g.drawRect( 0, 0, w, h);
    g.endFill();
    _regCenter( shape, w, h );
    shape.x = 0, shape.y = 0;
    return shape;
  }

  function _regCenter( displayObject, w, h ) {
    displayObject.regX = w / 2, displayObject.regY = h / 2;//reg
  }

  /**
  * 画像縮小処理のため、画像をCanvasでキャプチャ
  */
  function _getBitmapCapture( img, scaleX, scaleY, type ) {
    var tempCanvas = document.createElement("canvas");
    tempCanvas.setAttribute("width", img.width * scaleX);
    tempCanvas.setAttribute("height", img.height * scaleY);
    var context = tempCanvas.getContext("2d");
    context.drawImage(img, 0, 0, img.width * scaleX, img.height  *  scaleY);
    var img = tempCanvas.toDataURL( type );
    tempCanvas = null;
    context = null;
    return img;
  }

  var exports = {};
  exports.init = init;
  return exports;
}());
