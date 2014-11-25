'use strict';
var evolution = (function() {
  var _canvas;
  var _stage;
  var _circle;

  //Bitmap
  var _bm = {
    bg: "",
    card1: "",
    card2: "",
    cardResult: "",
    cardGrow: "",
    particle001: "",
    particle002: "",
    glowline: "",
    cardResultGrowBM: "",
    card1GrowBM: "",
    card2GrowBM: ""
  }

  //Shape
  var _shape = {
    card1GlossLine:"",
    card2GlossLine:"",
    cardResultGlossLine:""
  }

  var _fileName = {
    bg: "",
    card1: "",
    card2: "",
    cardResult: "",
    cardGrow: "",
    particle001: "",
    particle002: "",
    glowline: ""
  }

  //Matrix
  var _card1Matrix;
  var _card2Matrix;

  //callback
  var _loadCompleteCallback;
  var _contentsCompleteCallback;

  /**
  * 初期化
  */
  function init(canvasID, fileName, loadCompleteCallback, contentsCompleteCallback, divNum ) {

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
      _bm.bg = new createjs.Bitmap( bg );
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
    _fileName.card1 = fileName.card1;
    _fileName.card2 = fileName.card2;
    _fileName.cardResult = fileName.cardResult;
    _fileName.cardGrow = fileName.cardGrow;
    _fileName.particle001 = fileName.particle001;
    _fileName.particle002 = fileName.particle002;
    _fileName.glowline = fileName.glowline;

    _contentsCompleteCallback = contentsCompleteCallback;

    bg.src = _fileName.bg;
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
    createjs.Tween.get( _bm.card1 ).wait(450).to( {y: 0}, 500, createjs.Ease.backOut );
    createjs.Tween.get( _bm.card2 ).wait(600).to( {y: 0}, 500, createjs.Ease.backOut );

    createjs.Tween.get( _bm.card1GrowBM ).wait(600).to( { alpha: 0.8 }, 600, createjs.Ease.backIn );
    createjs.Tween.get( _bm.card2GrowBM ).wait(600).to( { alpha: 0.8 }, 600, createjs.Ease.backIn );

    createjs.Tween.get( _shape.card1GlossLine ).wait(900).to( { x: 800 }, 400, createjs.Ease.liner );
    createjs.Tween.get( _shape.card1GlossLine ).wait(900).to( { alpha: 0.2 }, 400, createjs.Ease.liner );
    createjs.Tween.get( _shape.card2GlossLine ).wait(900).to( { x: 800 }, 400, createjs.Ease.liner );
    createjs.Tween.get( _shape.card2GlossLine ).wait(900).to( { alpha: 0.2 }, 400, createjs.Ease.liner );

    var d = 0;
    var d2 = 0;

    var card1SwingIntervalID;
    setTimeout( function(){
      card1SwingIntervalID = setInterval( function() {
        _bm.card1.y = Math.sin( d ) * 10;
        d += 0.1;
      }, 18 );
    }, 900 );

    var card2SwingIntervalID
    setTimeout( function(){
      card2SwingIntervalID = setInterval( function() {
        _bm.card2.y = Math.sin( d2 ) * 10;
        d2 += 0.1;
      }, 18 );
    }, 1050 );

    setTimeout( function(){
      clearInterval( card1SwingIntervalID );
      clearInterval( card2SwingIntervalID );
      createjs.Tween.get( _bm.card1 ).to( { y: 0 }, 500, createjs.Ease.backOut );
      createjs.Tween.get( _bm.card2 ).to( { y: 0 }, 500, createjs.Ease.backOut );
    }, 2400);
    setTimeout( function(){
      _animationStep02();
    }, 2500);
  }

  function _animationStep02() {

    createjs.Tween.get( _bm.card1 ).to( { x: -(_stage.canvas.width / 2) + 50 }, 800, createjs.Ease.sineIn );
    createjs.Tween.get( _bm.card2 ).to( { x: (_stage.canvas.width / 2) - 50 }, 800, createjs.Ease.sineIn );

    setTimeout( function(){
      createjs.Tween.get( _bm.card1 ).to( { x: -((_stage.canvas.width / 2) - 200) }, 300, createjs.Ease.backIn );
      createjs.Tween.get( _bm.card2 ).to( { x: (_stage.canvas.width / 2) - 200 }, 300, createjs.Ease.backIn );
    }, 800 );

    setTimeout( function(){
      createjs.Tween.get( _bm.card1).to( { x: 0 }, 2000, createjs.Ease.sineOut );
      createjs.Tween.get( _bm.card2).to( { x: 0 }, 2000, createjs.Ease.sineOut );
    }, 1100 );

    setTimeout( function(){
      _setmask();
      _setGlowLine();
    }, 1110 );

    var brightness;
    setTimeout( function(){
      brightness = _brightness();
      createjs.Tween.get( brightness ).to( { alpha: 1 }, 500, createjs.Ease.sineOut );

    }, 1700 );

    setTimeout( function(){
      _animationStep03( brightness );
    }, 2500 );
  }

  function _animationStep03( brightness ) {
    _bm.card1.visible = false;
    _bm.card2.visible = false;
    _bm.glowline.visible = false;
    _bm.cardResult.visible = true;
    createjs.Tween.get( brightness ).to( { alpha: 0 }, 500, createjs.Ease.sineOut );
    createjs.Tween.get( _shape.cardResultGlossLine ).to( { x: 1600 }, 300, createjs.Ease.liner );
    createjs.Tween.get( _shape.cardResultGlossLine ).to( { alpha: 0.2 }, 200, createjs.Ease.liner );

    setTimeout( function(){
      var scale = ( _stage.canvas.width - 200 ) / 700;//scale
      createjs.Tween.get( _bm.cardResult ).to( { scaleX: scale, scaleY: scale }, 700, createjs.Ease.backOut );
    }, 10 );
    setTimeout( function(){
      _startParticle();
    }, 10 );

    setTimeout( function(){
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

      _contentsCompleteCallback();
    }, 600 );
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
  * アニメーションスタート
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
        par.x = ( Math.random() * _stage.canvas.width ) - (_stage.canvas.width / 2);
        par.y = ( Math.random() * _stage.canvas.height ) - (_stage.canvas.height / 2);
        par.alpha = 0;
        var wait = Math.random() * 300;
        var aspeed = (Math.random() * 400) + 100;
        var yspeed = (Math.random() * 500) + 300;
        var targetY = (Math.random() * 10);
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

  /**
  * 画像読込
  */
  function _loadImage( callback ) {

    var cardScale = ( ( _stage.canvas.width / 2 ) - 70 ) / 320;

    var cardResult = new Image();
    cardResult.onload = function() {
      var cardResultBM = new createjs.Bitmap( cardResult );
      var w = cardResultBM.image.width;
      var h = cardResultBM.image.height;
      cardResultBM.cache(0, 0, w, h);
      _regCenter( cardResultBM, w, h );
      cardResultBM.x = 0; cardResultBM.y = 0;
      _bm.cardResult.addChild( cardResultBM );

      //glossLine
      _shape.cardResultGlossLine = _getGlossline( w, h );
      _shape.cardResultGlossLine.mask = _getMask( w, h );
      _shape.cardResultGlossLine.x =-400;
      _bm.cardResult.addChild( _shape.cardResultGlossLine );

      _bm.cardResult.x = 0, _bm.cardResult.y = 0;
      _bm.cardResult.scaleX = ( _stage.canvas.width - 300 ) / cardResultBM.image.width, _bm.cardResult.scaleY = _bm.cardResult.scaleX;//scale
      _bm.cardResult.visible = false;
      _stage.addChild( _bm.cardResult );
      callback();
      cardResult.onload = null;
      cardResult = null;
    }

    var glowline = new Image();
    glowline.onload = function() {
      _bm.glowline = new createjs.Bitmap( glowline );
      _bm.glowline.cache(0, 0, _bm.glowline.image.width, _bm.glowline.image.height);
      _bm.glowline.regX = _bm.glowline.image.width / 2, _bm.glowline.regY = _bm.glowline.image.height / 2;//reg
      _bm.glowline.x = 0, _bm.glowline.y = 0;
      _bm.glowline.visible = false;
      _bm.glowline.scaleY = 0.85;
      cardResult.src = _fileName.cardResult;
      _stage.addChild( _bm.glowline );
      glowline.onload = null;
      glowline = null;
    }

    var card1 = new Image();
    card1.onload = function() {
      var card1BM = new createjs.Bitmap( card1 );
      var w = card1BM.image.width;
      var h = card1BM.image.height;
      _regCenter( card1BM, w, h );
      card1BM.x = 0; card1BM.y = 0;
      _bm.card1.addChild( card1BM );

      //glossLine
      _shape.card1GlossLine = _getGlossline( w, h );
      _shape.card1GlossLine.mask = _getMask( w, h );
      _shape.card1GlossLine.x =-400;
      _bm.card1.addChild( _shape.card1GlossLine );

      _bm.card1.x = -160; _bm.card1.y = _stage.canvas.height + 200;
      _bm.card1.scaleX = _bm.card1.scaleY = cardScale / 2;
      _stage.addChild( _bm.card1 );
      card1.onload = null;
      card1 = null;
      glowline.src = _fileName.glowline;
    }

    var card2 = new Image();
    card2.onload = function() {
      var card2BM = new createjs.Bitmap( card2 );
      var w = card2BM.image.width;
      var h = card2BM.image.height;
      _regCenter( card2BM, w, h );
      card2BM.x = 0; card2BM.y = 0;
      _bm.card2.addChild( card2BM );

      //glossLine
      _shape.card2GlossLine = _getGlossline( w, h );
      _shape.card2GlossLine.mask = _getMask( w, h );
      _shape.card2GlossLine.x =-400;
      _bm.card2.addChild( _shape.card2GlossLine );

      _bm.card2.x = +160; _bm.card2.y = _stage.canvas.height + 200;
      _bm.card2.scaleX = _bm.card2.scaleY = cardScale / 2;
      _stage.addChild( _bm.card2 );
      card2.onload = null;
      card2 = null;
      card1.src = _fileName.card1;
    }

    var cardGrow = new Image();
    cardGrow.onload = function() {
      cardGrow.onload = null;
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
      _bm.cardResultGrowBM.scaleX = 1.95;
      _bm.cardResultGrowBM.scaleY = 2.05;
      _bm.card1 = new createjs.Container();
      _bm.card1.addChild( _bm.card1GrowBM );
      _bm.card2 = new createjs.Container();
      _bm.card2.addChild( _bm.card2GrowBM );
      _bm.cardResult = new createjs.Container();
      _bm.cardResult.addChild( _bm.cardResultGrowBM );

      card2.src = _fileName.card2;
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

  var exports = {};
  exports.init = init;
  return exports;
}());
