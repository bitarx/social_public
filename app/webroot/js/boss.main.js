'use strict';
var boss = boss || {};
boss.main = ( function() {

  var _loader = boss.loader;
  var _view = boss.view;
  var _paramater = boss.paramater;
  var _stocker = boss.stocker;
  var _layout = boss.layout;

  var _scene;
  var _timeoutID;
  var _turnCount;//ターン数カウンタ

  /**
  * 初期化
  */
  function init( canvasID, fileName, initial, playerSkillData, enemySkillData, turn, loadCompleteCallback, contentsCompleteCallback ) {

    _timeoutID = new Array();
    _scene = 0;

    var canvas = document.getElementById(canvasID);
    canvas.style.width = window.innerWidth + 'px';
    canvas.style.height = Math.floor( canvas.style.width * 1.3 )


    _stocker.setDO( "stage", new createjs.Stage( canvas ) );

    var matrix = _stocker.getDO( "stage" ).getMatrix();
    matrix.translate( canvas.width >> 1, canvas.height >> 1 );
    matrix.decompose( _stocker.getDO( "stage" ) );

    _paramater.init( initial.enemy, initial.player, playerSkillData, enemySkillData, turn );

    _turnCount = _paramater.getParam( "turnData" ).length;

    _view.init( contentsCompleteCallback );

    //画像の読込
    var loadComplete = function() {
      _layout.init();

      loadCompleteCallback();
      _startOpening();
    }
    var playerFileNameList = new Array();
    var len = initial.player.length;
    for( var i = 0; i < len; i++ ) {
      playerFileNameList.push( initial.player[ i ].img );
    }
    _loader.load( fileName, playerFileNameList, initial.enemy.img, loadComplete );
  }

  /**
  * オープニング開始
  */
  function _startOpening() {

    _scene = 1;

    _view.setNextArrow( true );
    _view.setOpening();

    createjs.Ticker.setFPS( 40 );
    createjs.Ticker.addEventListener( "tick", _stocker.getDO( "stage" ) );
  }

  /**
  * スキル発動
  */
  function _startSkill() {

    _scene = 2;

    var count = 0;
    var skill = _paramater.getParam( "playerSkillData" );
    var len = skill.length;
    for( var i = 0; i < len; i++ ) {
      if( skill[ i ] ) {
        var timeoutID = setTimeout( function( i ){
          _view.setSkillWords( i, skill[ i ].type, skill[ i ].words );
        }, 2000 * count, i );
        count++;
        _timeoutID.push( timeoutID );
      }
    }

    var enemySkill = _paramater.getParam( "enemySkillData" );
    if( enemySkill ) {
      var timeoutID = setTimeout( function( i ){
        _view.setEnemySkill( enemySkill.type, enemySkill.words );
      }, 2000 * count, i );
      count++;
      _timeoutID.push( timeoutID );
    }

    var timeoutID2 = setTimeout( function( i ){
      _startTurn();
    }, 2000 * count + 300 );
    _timeoutID.push( timeoutID2 );
  }

  /**
  * ターン開始
  */
  function _startTurn() {

    _scene = 3;

    var turnData = _paramater.getParam( "turnData" );
    var currentTurnData = turnData[ turnData.length - _turnCount ];
    _view.setTurn( _turnCount );
    _startPlayerTurn( currentTurnData );
  }

  /**
  * playerターン開始
  */
  function _startPlayerTurn( currentTurnData ) {
    var count = 0;
    var len = currentTurnData.enemyHP.length;
    for( var i = 0; i < len; i++ ) {

      if( _paramater.getParam( "playerData" )[ i ].current > 0 ) {

        setTimeout( function( i ){
          //プレイヤーキャラクター攻撃
          var enemyHP = currentTurnData.enemyHP[ i ];
          var enemyDamage = _paramater.getParam( "enemyData" ).current - enemyHP;
          _view.bossDamage( i, _paramater.getParam( "enemyData" ).max, _paramater.getParam( "enemyData" ).current, enemyHP, enemyDamage );
          _paramater.getParam( "enemyData" ).current = enemyHP;

          if( enemyHP <= 0 ) {
            _bossDedAction();
          }

          if( ( len - 1 ) <= i ) {
            setTimeout( function( i ){
              _startEnemyTurn( currentTurnData );
            }, 1000 );
          }
        }, 700 * count, i );
        count++;
        if( currentTurnData.enemyHP[ i ] <= 0 ) {
          break;
        }

      }

    }

  }

  /**
  * 敵ターン開始
  */
  function _startEnemyTurn( currentTurnData ) {
    var len = currentTurnData.playerHP.length;

    for( var i = 0; i < len; i++ ) {
      var playerHP = currentTurnData.playerHP[ i ];

      var playerDamage = _paramater.getParam( "playerData" )[ i ].current - playerHP;
      if( playerDamage >= 0 ) {
        if( playerHP != null ) {
          if( _paramater.getParam( "playerData" )[ i ].current > 0 ) {
            _view.playerDamage( i, _paramater.getParam( "playerData" )[ i ].max, _paramater.getParam( "playerData" )[ i ].current, playerHP, playerDamage );
            _paramater.getParam( "playerData" )[ i ].current = playerHP;
          }
        }
      }
    }
    _endTurn();
  }

  /**
  * ターン終了
  */
  function _endTurn() {
    var flg = false;
    var len = _paramater.getParam( "playerData" ).length;
    for( var i = 0; i < len; i++ ) {
      if( _paramater.getParam( "playerData" )[ i ].current > 0 ) {
        flg = true;
        break;
      }
    }

    if( flg ) {
      _turnCount--;
      if(_turnCount <= 0) {
        setTimeout( function( i ){
          _view.setTurn( 0 );
          _view.setResult( false );
        }, 1000 );
      } else {
        setTimeout( function( i ){
          _startTurn();
        }, 1000 );
      }
    } else {
      setTimeout( function( i ){
        _view.setResult( false );
      }, 500 );
    }

  }

  /**
  * 敵撃破
  */
  function _bossDedAction() {
    setTimeout( function( i ){
      _view.setResult( true );
    }, 500 );
  }


  function skip() {

    switch( _scene ) {
      case 1:
        _view.setNextArrow( false );
        _allRemoveTimeout();
        _scene = 2;
        createjs.Tween.removeAllTweens();
        _view.stopOpening();
        _timeoutID.push( setTimeout( function( i ){
          _startSkill();
        }, 500 ) );
        break;
      case 2:
        _allRemoveTimeout();
        _scene = 3;
        createjs.Tween.removeAllTweens();
        _view.stopSkill();
        _timeoutID.push( setTimeout( function( i ){
          _startTurn();
        }, 500 ) );
        break;
      default:
        _view.setNextArrow( false );
        _allRemoveTimeout();
        _scene = 2;
        createjs.Tween.removeAllTweens();
        _view.stopOpening();
        _timeoutID.push( setTimeout( function( i ){
          _startSkill();
        }, 500 ) );
        break;

    }
  }

  function _allRemoveTimeout() {
    var len = _timeoutID.length;
    for( var i = 0; i < len; i++ ) {
      clearTimeout( _timeoutID[ i ] );
    }
    _timeoutID = new Array();
  }


  var exports = {};
  exports.init = init;
  exports.skip = skip;
  return exports;

}());
