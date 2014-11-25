'use strict';
var boss = boss || {};
boss.loader = ( function() {

  var _stocker = boss.stocker;

  var _callback;

  function load( fileName, playerFileNameList, enemyFileName, callback ) {

    var bg = new Image();
    bg.onload = function() {
      var bg_bm = new createjs.Bitmap( this );
      bg_bm.regX = bg_bm.image.width / 2; bg_bm.regY = bg_bm.image.height / 2;
      _stocker.getDO( "stage" ).addChild( bg_bm );
      _stocker.setDO( "bg", bg_bm );
      _stocker.getDO( "stage" ).update();
      bg.onload = null;
      bg = null;

      _loadStart( fileName, playerFileNameList, enemyFileName, function() {
        _callback();
      } );
    };

    _callback = callback;
    bg.src = fileName.bg;
  }

  function _loadStart( fileName, playerFileNameList, enemyFileName, callback ) {

    var manifest = [
      {src: enemyFileName, id: "enemy" },
      {src: fileName.enemyHPProgBase, id: "enemyHPProgBase" },
      {src: fileName.enemyHPProgRed, id: "enemyHPProgRed" },
      {src: fileName.playerHPProgBase, id: "playerHPProgBase" },
      {src: fileName.playerHPProgBaseT, id: "playerHPProgBaseT" },
      {src: fileName.namePlate, id: "namePlate" },
      {src: fileName.playerHPProgBar, id: "playerHPProgBar" },
      {src: fileName.fukidashiMiddle, id: "fukidashiMiddle" },
      {src: fileName.fukidashiLeftUnder, id: "fukidashiLeftUnder" },
      {src: fileName.particle001, id: "particle001" },
      {src: fileName.particle002, id: "particle002" },
      {src: fileName.winText, id: "winText" },
      {src: fileName.loseText, id: "loseText" },
      {src: fileName.battleStartText, id: "battleStartText" },
      {src: fileName.arrow, id: "arrow" },
      {src: fileName.attack001, id: "attack001" },
      {src: fileName.attack002, id: "attack002" },
      {src: fileName.playerPowerUP, id: "playerPowerUP" },
      {src: fileName.playerPowerDown, id: "playerPowerDown" },
      {src: fileName.gion001, id: "gion001" },
      {src: fileName.gion002, id: "gion002" },
      {src: fileName.gion003, id: "gion003" },
      {src: fileName.yajirushiDown, id: "yajirushiDown" },
      {src: fileName.numSL, id: "numSL" }
    ];

    for( var i = 0; i < fileName.numList.length; i++ ) {
      manifest.push( { src: fileName.numList[ i ], id: "num_" + i } );
    }

    for( var j = 0; j < fileName.num_l_List.length; j++ ) {
      manifest.push( { src: fileName.num_l_List[ j ], id: "num_l_" + j } );
    }

    for( var k = 0; k < fileName.num_d_List.length; k++ ) {
      manifest.push( { src: fileName.num_d_List[ k ], id: "num_d_" + k } );
    }


    var completeHandler = function( e ) {

      _stocker.setDO( "enemy", _getBitmap( loader.getResult( "enemy" ), "center" ) );
      _stocker.setDO( "enemyHPProgBase", _getBitmap( loader.getResult( "enemyHPProgBase" ), "center" ) );
      _stocker.setDO( "enemyHPProgRed", _getBitmap( loader.getResult( "enemyHPProgRed" ), "centerY" ) );
      _stocker.setDO( "playerHPProgBase", _getBitmap( loader.getResult( "playerHPProgBase" ), "center" ) );
      _stocker.setDO( "playerHPProgBaseT", _getBitmap( loader.getResult( "playerHPProgBaseT" ), "center" ) );
      _stocker.setDO( "namePlate", _getBitmap( loader.getResult( "namePlate" ), "center" ) );
      _stocker.setDO( "playerHPProgBar", _getBitmap( loader.getResult( "playerHPProgBar" ), "centerY" ) );
      _stocker.setDO( "fukidashiMiddle", _getBitmap( loader.getResult( "fukidashiMiddle" ), "center" ) );
      _stocker.setDO( "fukidashiLeftUnder", _getBitmap( loader.getResult( "fukidashiLeftUnder" ), "centerX" ) );
      _stocker.setDO( "particle001", _getBitmap( loader.getResult( "particle001" ), "center" ) );
      _stocker.setDO( "particle002", _getBitmap( loader.getResult( "particle002" ), "center" ) );
      _stocker.setDO( "winText", _getBitmap( loader.getResult( "winText" ), "center" ) );
      _stocker.setDO( "loseText", _getBitmap( loader.getResult( "loseText" ), "center" ) );
      _stocker.setDO( "battleStartText", _getBitmap( loader.getResult( "battleStartText" ), "center" ) );
      _stocker.setDO( "arrow", _getBitmap( loader.getResult( "arrow" ), "center" ) );
      _stocker.setDO( "attack001", _getBitmap( loader.getResult( "attack001" ), "center" ) );
      _stocker.setDO( "attack002", _getBitmap( loader.getResult( "attack002" ), "center" ) );
      _stocker.setDO( "playerPowerUP", _getBitmap( loader.getResult( "playerPowerUP" ), "centerX" ) );
      _stocker.setDO( "playerPowerDown", _getBitmap( loader.getResult( "playerPowerDown" ), "centerX" ) );
      _stocker.setDO( "gion001", _getBitmap( loader.getResult( "gion001" ), "center" ) );
      _stocker.setDO( "gion002", _getBitmap( loader.getResult( "gion002" ), "center" ) );
      _stocker.setDO( "gion003", _getBitmap( loader.getResult( "gion003" ), "center" ) );
      _stocker.setDO( "yajirushiDown", _getBitmap( loader.getResult( "yajirushiDown" ), "center" ) );
      _stocker.setDO( "numSL", _getBitmap( loader.getResult( "numSL" ), "center" ) );

      var numList = new Array();
      for( var i = 0; i < fileName.numList.length; i++ ) {
        numList.push( _getBitmap( loader.getResult( "num_" + i ), "center" ) );
      }
      _stocker.setDO( "numList", numList );

      var num_l_List = new Array();
      for( var j = 0; j < fileName.num_l_List.length; j++ ) {
        num_l_List.push( _getBitmap( loader.getResult( "num_l_" + j ), "center" ) );
      }
      _stocker.setDO( "num_l_List", num_l_List );

      var num_d_List = new Array();
      for( var k = 0; k < fileName.num_d_List.length; k++ ) {
        num_d_List.push( _getBitmap( loader.getResult( "num_d_" + k ), "center" ) );
      }
      _stocker.setDO( "num_d_List", num_d_List );


      loader.removeEventListener( "complete", completeHandler );
      loader = null;
      _loadPlayer( playerFileNameList, callback );
      manifest = null;
      completeHandler = null;
    }

    var loader = new createjs.LoadQueue( true );
    loader.setMaxConnections( 6 );
    loader.addEventListener( "complete", completeHandler );
    loader.loadManifest( manifest );
  }

  function _loadPlayer( playerFileNameList, callback ) {

    var playerBMList = new Array();
    var count = 0;
    var len = playerFileNameList.length;

    var i = 0;
    var eventFunc = function() {

      var imgFileName = playerFileNameList[ i ];
      i++;
      _loadImage( imgFileName, "center", function( bmContainer ){
        playerBMList.push( bmContainer );
        count++;

        if( count >= len ) {
          // 処理終了
          _stocker.setDO( "playerBMList", playerBMList );
          callback();
        } else {
           eventFunc();
        }
      } );
    }

    eventFunc();
  }

  function _loadImage( imageFileName, align, callback ) {
    var image = new Image();
    image.onload = function() {
      var bmContainer = _getBitmap( this, align );
      image.onload = null;
      image = null;
      callback( bmContainer );
    };

    image.src = imageFileName;
  }

  function _getBitmap( img, align ) {
    var bmContainer = new createjs.Bitmap( img );
    if( align == "center" ) {
      bmContainer.regX = bmContainer.image.width / 2; bmContainer.regY = bmContainer.image.height / 2;
    } else if( align == "centerY" ) {
      bmContainer.regY = bmContainer.image.height / 2;
    } else if( align == "centerX" ) {
      bmContainer.regX = bmContainer.image.width / 2;
    };

    bmContainer.cache(0, 0, bmContainer.image.width, bmContainer.image.height);
    return bmContainer;
  }

  var exports = {};
  exports.load = load;
  return exports;

}());
