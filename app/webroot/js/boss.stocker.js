'use strict';
var boss = boss || {};
boss.paramater = ( function() {

  var param = new Object();

  /**
  * 初期化
  */
  function init( enemyData, playerData, playerSkillData, enemySkillData, turnData ) {
    param[ "enemyData" ] = enemyData;
    param[ "playerData" ] = playerData;
    param[ "playerSkillData" ] = playerSkillData;
    param[ "enemySkillData" ] = enemySkillData;
    param[ "turnData" ] = turnData;
  }

  /**
  * パラメータ取得
  */
  function getParam( key ) {
    return param[ key ];
  }

  var exports = {};
  exports.init = init;
  exports.getParam = getParam;

  return exports;
}());
////////////////////////////////////////

boss.stocker = ( function() {

  var _displayObject = new Object();

  /**
  * ディスプレイオブジェクトセット
  */
  function setDO( id, displayObject ) {
    _displayObject[ id ] = displayObject;
  }

  /**
  * ディスプレイオブジェクト取得
  */
  function getDO( id ) {
    return _displayObject[ id ];
  }


  var exports = {};
  exports.setDO = setDO;
  exports.getDO = getDO;

  return exports;
}());
////////////////////////////////////////

boss.gage = ( function() {

  var _stocker = boss.stocker;

  /**
  * 敵HP最大値設定
  */
  function setBossMAXHP( max ) {
    var max_str = max.toString();
    var max_arr = max_str.split('');

    var len = max_arr.length;
    for( var i = 0; i < len; i++ ) {
      var num = max_arr[ i ];
      var bm = _stocker.getDO( "numList" )[ num ].clone();
      bm.scaleX = bm.scaleY = 0.3;
      bm.x = ( i + 1 ) * 20;
      _stocker.getDO( "bossMaxHP" ).addChild( bm );
    }

    _stocker.getDO( "numSL" ).scaleX = _stocker.getDO( "numSL" ).scaleY = 0.3;
    _stocker.getDO( "bossMaxHP" ).addChild( _stocker.getDO( "numSL" ) );
    //
  }

  /**
  * 敵HP現在値設定
  */
  function setBossCurrentHP( current ) {
    if( _stocker.getDO( "bossCurrentHP" ).removeChildAt( 0 ) ) {
      _stocker.getDO( "bossCurrentHP" ).removeChildAt( 0 );
    }
    var con = new createjs.Container();
    var current_str = current.toString();
    var current_arr = current_str.split('');
    current_arr.reverse();
    var len = current_arr.length;
    for( var j = 0; j < len; j++ ) {
      var num = current_arr[ j ];
      var bm = _stocker.getDO( "numList" )[ num ].clone();
      bm.scaleX = bm.scaleY = 0.3;
      bm.x = -( j * 20 );
      con.addChild( bm );
    }
    _stocker.getDO( "bossCurrentHP" ).addChild( con );
  }

  var exports = {};
  exports.setBossMAXHP = setBossMAXHP;
  exports.setBossCurrentHP = setBossCurrentHP;

  return exports;
}());
////////////////////////////////////////

boss.layout = ( function() {

  var _utils = boss.utils;
  var _stocker = boss.stocker;
  var _paramater = boss.paramater;
  var _gage = boss.gage;

  /**
  * 初期化
  */
  function init() {
    //背景
    _stocker.getDO( "bg" ).x = 0;
    _stocker.getDO( "bg" ).y = 0;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "bg" ) );

    //敵名前
    var bossName_txt = new createjs.Text( _paramater.getParam( "enemyData" ).name, "24px Arial", "#000" );
    _stocker.setDO( "bossName", bossName_txt );
    bossName_txt.regX = bossName_txt.width / 2; bossName_txt.regY = bossName_txt.height / 2;
    bossName_txt.y = -400;
    bossName_txt.textAlign = "center";
    _stocker.getDO( "stage" ).addChild( bossName_txt );

    //敵
    _stocker.setDO( "enemyContainer", new createjs.Container() );
    _stocker.getDO( "enemyContainer" ).addChild( _stocker.getDO( "enemy" ) );
    var bossDedMask = _getRect( _stocker.getDO( "enemy" ).image.width, _stocker.getDO( "enemy" ).image.height, "#000000" );
    bossDedMask.alpha = 0.5;
    bossDedMask.visible = false;
    _stocker.getDO( "enemyContainer" ).addChild( bossDedMask );
    _stocker.getDO( "enemyContainer" ).scaleX = _stocker.getDO( "enemyContainer" ).scaleY = 0.95;
    _stocker.getDO( "enemyContainer" ).x = 0; _stocker.getDO( "enemyContainer" ).y = -700;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "enemyContainer" ) );
    var enemyPowerUP = _stocker.getDO( "playerPowerUP" ).clone();
    enemyPowerUP.scaleX = _stocker.getDO( "enemy" ).image.width;
    enemyPowerUP.rotation = 180;
    enemyPowerUP.y = _stocker.getDO( "enemy" ).image.height / 2;
    _stocker.getDO( "enemyContainer" ).addChild( enemyPowerUP );
    enemyPowerUP.visible = false;
    enemyPowerUP.alpha = 0;

    var enemyArrow = _stocker.getDO( "arrow" ).clone();
    enemyArrow.alpha = 0;
    enemyArrow.y = 25;
    _stocker.getDO( "enemyContainer" ).addChild( enemyArrow );

    //ターン表示
    setTurn( _paramater.getParam( "turnData" ).length );

    //敵HPバーベース
    _stocker.getDO( "enemyHPProgBase" ).x = 0; _stocker.getDO( "enemyHPProgBase" ).y = 0;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "enemyHPProgBase" ) );

    //敵HPバー
    _stocker.getDO( "enemyHPProgRed" ).x = -233; _stocker.getDO( "enemyHPProgRed" ).y = 0;
    _stocker.getDO( "enemyHPProgRed" ).scaleX = 0;

    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "enemyHPProgRed" ) );


    //敵HP数値
    _stocker.setDO( "bossMaxHP", new createjs.Container() );
    _gage.setBossMAXHP( _paramater.getParam( "enemyData" ).max );
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "bossMaxHP" ) );

    _stocker.setDO( "bossCurrentHP", new createjs.Container() );
    _gage.setBossCurrentHP( _paramater.getParam( "enemyData" ).current );
    _stocker.getDO( "bossCurrentHP" ).x = _stocker.getDO( "bossMaxHP" ).x - 20;
    _stocker.getDO( "bossCurrentHP" ).y = _stocker.getDO( "bossMaxHP" ).y = -30;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "bossCurrentHP" ) );


    var setPlayer = function() {
      //Playerキャラクター
      _stocker.setDO( "playerListContainer", new createjs.Container() );
      _stocker.getDO( "stage" ).addChild( _stocker.getDO( "playerListContainer" ) );

      var palyerBMContainer = new Array();
      var palyerContainer = new Array();
      var hpBarContainer = new Array();
      var len = _stocker.getDO( "playerBMList" ).length;
      var d = ((( 110+ 15 ) * len) / 2) - ( (110 + 15) /2);
      for( var i = 0; i < len; i++ ) {
        var bm = _stocker.getDO( "playerBMList" )[ i ];
        bm.scaleX = bm.scaleY = 0.5;

        var bmcontainer = new createjs.Container();
        bmcontainer.addChild( bm );
        palyerBMContainer.push( bmcontainer );

        var container = new createjs.Container();
        container.addChild( bmcontainer );

        var dedMask = _getRect( bm.image.width/2, bm.image.height/2, "#000000" );
        dedMask.alpha = 0;
        dedMask.visible = false;
        container.addChild( dedMask );

        var damageMask = _getRect( bm.image.width/2, bm.image.height/2, "#FF0000" );
        damageMask.alpha = 0.5;
        damageMask.visible = false;
        container.addChild( damageMask );

        var hpProgBase = _stocker.getDO( "playerHPProgBase" ).clone();
        hpProgBase.scaleX = 0.5;
        hpProgBase.scaleY = 0.8;
        hpProgBase.y = 70;
        container.addChild( hpProgBase );

        var hpProgBar = _stocker.getDO( "playerHPProgBar" ).clone();
        hpProgBar.scaleY = 0.8;
        hpProgBar.scaleX = _utils.getPercentage( _paramater.getParam( "playerData" )[ i ].max, _paramater.getParam( "playerData" )[ i ].current, 58 );;
        hpProgBar.x = -58;
        hpProgBar.y = 70;
        container.addChild( hpProgBar );

        var playerPowerUP = _stocker.getDO( "playerPowerUP" ).clone();
        playerPowerUP.scaleX = 110;
        playerPowerUP.alpha = 0;
        playerPowerUP.rotation = 180;
        playerPowerUP.y = playerPowerUP.image.height / 2;
        bmcontainer.addChild( playerPowerUP );

        var playerPowerDown = _stocker.getDO( "playerPowerDown" ).clone();
        playerPowerDown.scaleX = 110;
        playerPowerDown.alpha = 0;
        playerPowerDown.rotation = 180;
        playerPowerDown.y = playerPowerDown.image.height / 2;
        bmcontainer.addChild( playerPowerDown );

        var arrow = _stocker.getDO( "arrow" ).clone();
        arrow.alpha = 0;
        arrow.y = 25;
        bmcontainer.addChild( arrow );

        hpBarContainer.push( hpProgBar );

        container.x = ( ( 110+ 15 ) * i ) - d;
        container.y = 100 + 500;
        palyerContainer.push( container );
        _stocker.getDO( "playerListContainer" ).addChild( container );
      }
      _stocker.setDO( "playerBMContainer", palyerBMContainer );
      _stocker.setDO( "playerContainer", palyerContainer );
      _stocker.setDO( "hpBarContainer", hpBarContainer );
    }
    setPlayer();
    setPlayer = null;

    //勝利テキスト
    _stocker.getDO( "winText" ).x = 0; _stocker.getDO( "winText" ).y = -200;
    _stocker.getDO( "winText" ).visible = false;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "winText" ) );

    //敗北テキスト
    _stocker.getDO( "loseText" ).x = 0; _stocker.getDO( "loseText" ).y = -200;
    _stocker.getDO( "loseText" ).visible = false;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "loseText" ) );

    _stocker.getDO( "yajirushiDown" ).scaleX = _stocker.getDO( "yajirushiDown" ).scaleY = 0.3;
    _stocker.getDO( "yajirushiDown" ).y = 400;
    _stocker.getDO( "yajirushiDown" ).visible = false;
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "yajirushiDown" ) );

    //再描画
    _stocker.getDO( "stage" ).update();
  }

  /**
  * 敵HP現在値設定
  */
  function _getRect( w, h, color ) {
    var shape = new createjs.Shape();
    var g = shape.graphics;
    g.beginFill( color );
    g.drawRect( 0, 0, w, h);
    g.endFill();
    shape.regX = w / 2; shape.regY = h / 2;
    shape.x = 0, shape.y = 0;
    return shape;
  }

  /**
  * ターン数設定
  */
  function setTurn( num ) {
    if( _stocker.getDO( "turnNum" ) ) {
      _stocker.getDO( "stage" ).removeChild( _stocker.getDO( "turnNum" ) );
      _stocker.setDO( "turnNum", null );
    }

    var turnNum_bm = _stocker.getDO( "num_l_List" )[ num ];
    turnNum_bm.scaleX = turnNum_bm.scaleY = 0.5;
    turnNum_bm.x = 250;
    turnNum_bm.y = -310;
    _stocker.setDO( "turnNum", turnNum_bm );
    _stocker.getDO( "stage" ).addChild( _stocker.getDO( "turnNum" ) );
  }

  var exports = {};
  exports.init = init;
  exports.setTurn = setTurn;

  return exports;
}());