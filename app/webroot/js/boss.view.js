'use strict';
alert('boss.view');
var boss = boss || {};
boss.view = ( function() {

  var _utils = boss.utils;
  var _paramater = boss.paramater;
  var _stocker = boss.stocker;
  var _paramater = boss.paramater;
  var _gage = boss.gage;
  var _layout = boss.layout;

  var _timeoutID;
  var _intervalID;
  var _fukidashi;
  var _contentsCompleteCallback;


  /**
  * 初期化
  */
  function init( contentsCompleteCallback ) {
    _intervalID = new Array();
    _contentsCompleteCallback = contentsCompleteCallback;
  }

  /**
  * オープニング
  */
  function setOpening() {
    var enemyCont = _stocker.getDO( "enemyContainer" );
    enemyCont.y = -500;
    createjs.Tween.get( enemyCont )
    .wait( 100 )
    .to( { y: -200, }, 400, createjs.Ease.backOut )

    _timeoutID = setTimeout( function() {
     _stageShake();
      var param = { value: 0 };
      var intervalID = setInterval( function() {
        var par = _utils.getPercentage( _paramater.getParam( "enemyData" ).max, param.value, 99 );

        _stocker.getDO( "enemyHPProgRed" ).scaleX = par;

        _gage.setBossCurrentHP( Math.floor( param.value ) );
      }, 40 / 1000 );

      createjs.Tween.get( param )
      .to( { value: _paramater.getParam( "enemyData" ).current }, 600, createjs.Ease.sineOut )
      .call( function() {
        clearInterval( intervalID );
        _gage.setBossCurrentHP( Math.floor( param.value ) );
      } );
      _intervalID.push( intervalID );

    }, 300 );



    var len = _stocker.getDO( "playerContainer" ).length;
    var count = 0;
    var complete = function() {
      var len = _stocker.getDO( "playerContainer" ).length;
      count++;
      if( len == count ) {
        var len = _intervalID.length;

        for( var i = 0; i < len; i++ ) {

          _stocker.getDO( "battleStartText" ).y = -100;
          _stocker.getDO( "battleStartText" ).scaleX = _stocker.getDO( "battleStartText" ).scaleY = 0;
          _stocker.getDO( "battleStartText" ).alpha = 0;
          _stocker.getDO( "stage" ).addChild( _stocker.getDO( "battleStartText" ) );
          createjs.Tween.get( _stocker.getDO( "battleStartText" ) )
          .to( { alpha:1, scaleX: 0.6, scaleY: 0.6, }, 400, createjs.Ease.backOut )
        }
      }
    };
    for( var i = 0; i < len; i++ ) {
      var p = _stocker.getDO( "playerContainer" )[ i ];
      var vect = 0;
      createjs.Tween.get( p )
      .wait( (100 * i) + 500 )
      .to( { y: 100 }, 400, createjs.Ease.backInOut )
      .call( function(){
        _intervalID.push( setInterval( function( p ) {
          p.y = Math.sin( vect ) * 10 + 100;
          vect += 0.03;
        }, 30, this ) );
        complete();
      } );
    }

    _intervalID.push( setInterval( function( x, y ) {
      var intervalID = setInterval( function( x, y ) {
        var enemy = _stocker.getDO( "enemyContainer" );
        enemy.x = 0 + (Math.random() * 10 - 5);
        enemy.y = -200 + (Math.random() * 10 - 5);
      }, 30, x, y );
      setTimeout( function() {
        clearInterval( intervalID );
        var enemy = _stocker.getDO( "enemyContainer" );
        enemy.x = 0;
        enemy.y = -200;
      }, 500, x, y );
      _intervalID.push( intervalID );
    }, 5000, _stocker.getDO( "enemyContainer" ).x, _stocker.getDO( "enemyContainer" ).y ) );
  }


  /**
  * スキル演出
  */
  function setSkillWords( id, type, words ) {

    var p = _stocker.getDO( "playerContainer" )[ id ];
    var bmc = _stocker.getDO( "playerBMContainer" )[ id ];

    createjs.Tween.get( bmc )
    .to( { y: -50 }, 200, createjs.Ease.sineOut )
    .wait( 1200 )
    .to( { y: 0 }, 100, createjs.Ease.sineIn );

    _setDamageEffect002( p.x, p.y );

    var cont = new createjs.Container();

    _stocker.getDO( "fukidashiMiddle" ).scaleX = _stocker.getDO( "fukidashiMiddle" ).scaleY = 0.62;
    var w = ( _stocker.getDO( "fukidashiMiddle" ).image.width / 2 ) - 40;
    var h = ( _stocker.getDO( "fukidashiMiddle" ).image.height / 2 ) - 40;
    words = _utils.getTextWidth( "16px Arial", words, w );
    var skill_txt = new createjs.Text( words, "16px Arial", "#000" );

    skill_txt.textAlign = "center";
    skill_txt.lineHeight = 25;

    var b = skill_txt.getBounds();
    skill_txt.y = -( b.height / 2 );

    _intervalID.push( setTimeout( function() {
      //スキル演出
      _setSkillEffect( bmc, type );
    }, 200 ) );
    _intervalID.push( setTimeout( function() {
      _fukidashi = null;
      _stocker.getDO( "stage" ).removeChild( cont );
    }, 1200 ) );

    _stocker.getDO( "fukidashiLeftUnder" ).scaleX = _stocker.getDO( "fukidashiLeftUnder" ).scaleY = 0.62;
    _stocker.getDO( "fukidashiLeftUnder" ).y = h + 8.5;
    _stocker.getDO( "fukidashiLeftUnder" ).x = p.x;

    cont.y = -80;
    cont.addChild( _stocker.getDO( "fukidashiMiddle" ) );
    cont.addChild( _stocker.getDO( "fukidashiLeftUnder" ) );
    cont.addChild( skill_txt );
    _stocker.getDO( "stage" ).addChild( cont );

    _fukidashi = cont;
  }

  function setEnemySkill( type, words ) {
    var cont = new createjs.Container();

    _stocker.getDO( "fukidashiMiddle" ).scaleX = _stocker.getDO( "fukidashiMiddle" ).scaleY = 0.62;
    var w = ( _stocker.getDO( "fukidashiMiddle" ).image.width / 2 ) - 40;
    var h = ( _stocker.getDO( "fukidashiMiddle" ).image.height / 2 ) - 40;
    words = _utils.getTextWidth( "16px Arial", words, w );
    var skill_txt = new createjs.Text( words, "16px Arial", "#000" );

    skill_txt.textAlign = "center";
    skill_txt.lineHeight = 25;

    var b = skill_txt.getBounds();
    skill_txt.y = -( b.height / 2 );

    _intervalID.push( setTimeout( function() {
      //スキル演出
      _setSkillEffect( null, type );
    }, 200 ) );
    _intervalID.push( setTimeout( function() {
      _fukidashi = null;
      _stocker.getDO( "stage" ).removeChild( cont );
    }, 1200 ) );

    _stocker.getDO( "fukidashiLeftUnder" ).rotation = 180;
    _stocker.getDO( "fukidashiLeftUnder" ).scaleX = _stocker.getDO( "fukidashiLeftUnder" ).scaleY = 0.62;
    _stocker.getDO( "fukidashiLeftUnder" ).x = 0;
    _stocker.getDO( "fukidashiLeftUnder" ).y = -( h + 8.5 );

    cont.y = -20;
    cont.addChild( _stocker.getDO( "fukidashiMiddle" ) );
    cont.addChild( _stocker.getDO( "fukidashiLeftUnder" ) );
    cont.addChild( skill_txt );
    _stocker.getDO( "stage" ).addChild( cont );

    _fukidashi = cont;
  }

  /**
  * スキル演出
  */
  function _setSkillEffect( bmc, type ) {

    var powerUP = function( bmc ) {
      var powerUP = bmc.getChildAt( 1 );
      var arrow = bmc.getChildAt( 3 );
      arrow.rotation = 0;
      arrow.y = 25;
      createjs.Tween.get( arrow )
      .to( { y: -25 }, 600, createjs.Ease.sineOut );
      createjs.Tween.get( arrow )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );

      powerUP.scaleY = 0;
      powerUP.y = 60;

      createjs.Tween.get( powerUP )
      .to( { scaleY: 1.5 }, 400, createjs.Ease.sineInOut );

      createjs.Tween.get( powerUP )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );
    }
    var powerDown = function( bmc ) {
      var powerDown = bmc.getChildAt( 2 );
      var arrow = bmc.getChildAt( 3 );
      arrow.rotation = 180;
      arrow.y = -25;
      createjs.Tween.get( arrow )
      .to( { y: 25 }, 600, createjs.Ease.sineOut );
      createjs.Tween.get( arrow )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );

      powerDown.scaleY = 0;
      powerDown.y = 60;

      createjs.Tween.get( powerDown )
      .to( { scaleY: 1.5 }, 400, createjs.Ease.sineOut );

      createjs.Tween.get( powerDown )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );
    }

    var enemyPowerUP = function() {
      var bmc = _stocker.getDO( "enemyContainer" );
      var powerUP = bmc.getChildAt( 2 );
      var arrow = bmc.getChildAt( 3 );

      arrow.rotation = 0;
      arrow.y = 45;
      createjs.Tween.get( arrow )
      .to( { y: -45 }, 600, createjs.Ease.sineOut );
      createjs.Tween.get( arrow )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );

      powerUP.scaleY = 0;
      powerUP.visible = true;

      createjs.Tween.get( powerUP )
      .to( { scaleY: 3 }, 400, createjs.Ease.sineOut );

      createjs.Tween.get( powerUP )
      .to( { alpha: 1 }, 200, createjs.Ease.sineOut )
      .wait( 200 )
      .to( { alpha: 0 }, 200, createjs.Ease.sineIn );
    }

    var allUP = function() {
      var len = _stocker.getDO( "playerBMContainer" ).length;
      for( var i = 0; i < len; i++ ) {
        var p = _stocker.getDO( "playerBMContainer" )[ i ];
        powerUP( p );
      }
    }
    var allDown = function() {
      var len = _stocker.getDO( "playerBMContainer" ).length;
      for( var i = 0; i < len; i++ ) {
        var p = _stocker.getDO( "playerBMContainer" )[ i ];
        powerDown( p );
      }
    }

    switch( type ) {
      case 1 :
        powerUP( bmc );
        break;
      case 2 :
        allUP();
        break;
      case 3 :
        powerDown( bmc );
        break;
      case 4 :
        allDown();
        break;
      case 5 :
        enemyPowerUP();
        break;
    }
  }

  /**
  * ターン数設定
  */
  function setTurn( num ) {
    _layout.setTurn( num );
  }

  /**
  * Playerダメージ
  */
  function playerDamage( id, max, initial, current, damage ) {
    var par = _utils.getPercentage( max, current, 58 );
    var p = _stocker.getDO( "hpBarContainer" )[ id ];
    createjs.Tween.get( p )
    .to( { scaleX: par }, 300, createjs.Ease.sineOut )
    .call( function() {
      if( par <= 0) {
        playeDed( id );
      }
    });

    createjs.Tween.get( _stocker.getDO( "enemyContainer" ) )
    .to( { y: -0 }, 100, createjs.Ease.sineOut )
    .call( function() {
      createjs.Tween.get( _stocker.getDO( "enemyContainer" ) )
      .to( { y: -200 }, 100, createjs.Ease.sineIn );
    } );

    setTimeout( function( id, damage ) {
      _stageShake();

      var pc = _stocker.getDO( "playerContainer" )[ id ];
      var damageMask = pc.getChildAt( 2 );
      damageMask.visible = true;
      createjs.Tween.get( pc )
      .to( { y: 300 }, 100, createjs.Ease.sineOut )
      .to( { y: 100 }, 150, createjs.Ease.sineOut )
      .call( function() {
        setTimeout( function( self ) {
          self.getChildAt( 2 ).visible = false;
        }, 300, this );
      } );

      _setDamage( damage, pc.x, pc.y, 1.5 );

    }, 80, id, damage );

  }

  /**
  * 敵ダメージ
  */
  function bossDamage( id, max, initial, current, damage ) {
    var param = { value: initial };
    var flg = false;
    var intervalID = setInterval( function() {
      var par = _utils.getPercentage( max, param.value, 99 );

      _stocker.getDO( "enemyHPProgRed" ).scaleX = par;

      _gage.setBossCurrentHP( Math.floor( param.value ) );
    }, 40 / 1000 );

    createjs.Tween.get( _stocker.getDO( "playerBMList" )[ id ] )
    .to( { y: -200 }, 100, createjs.Ease.sineOut )
    .call( function() {
      createjs.Tween.get( _stocker.getDO( "playerBMList" )[ id ] )
      .to( { y: 0 }, 150, createjs.Ease.sineIn )

      _bossShake();

      createjs.Tween.get( param )
      .to( { value: current }, 400, createjs.Ease.sineOut )
      .call( function() {
        clearInterval( intervalID );
        flg = true;
        _gage.setBossCurrentHP( Math.floor( param.value ) );
      } );

    })

    _setDamage( damage, _stocker.getDO( "playerContainer" )[ id ].x, -200, 2 );
  }

  /**
  * 敵揺れ
  */
  function playeDed( id ) {
    var p = _stocker.getDO( "playerContainer" )[ id ];

    var dedMask = p.getChildAt( 1 );
    dedMask.visible = true;
    createjs.Tween.get( dedMask )
    .to( { alpha: 0.7 }, 100, createjs.Ease.sineOut );

    _stocker.getDO( "playerListContainer" ).removeChild( p );
    _stocker.getDO( "playerListContainer" ).addChild( p );
    var r = Math.floor( Math.random() * 10 ) - 5;
    createjs.Tween.get( p )
    .to( { scaleX: 1.5, scaleY: 1.5, y:0, rotation: r }, 400, createjs.Ease.sineOut )
    .to( { scaleX: 1, scaleY: 1, y: 500 }, 200, createjs.Ease.sineIn )
  }

  /**
  * 敵揺れ
  */
  function _bossShake() {
    var valX = 0;
    var valY = 0;
    var d = 50;
    var iID = setInterval( function() {
      _stocker.getDO( "enemyContainer" ).x = Math.floor( Math.random() * d ) - ( d/2 );
      _stocker.getDO( "enemyContainer" ).y = -200 + ( Math.floor( Math.random() * d ) - ( d/2 ) );
      d -= 1;
      if( d < 0 ) {
        clearInterval( iID );
      }
    }, 10 );
  }

  /**
  * 画面揺れ
  */
  function _stageShake() {
    var valX = 0;
    var valY = 0;
    var d = 50;
    var iID = setInterval( function() {
      _stocker.getDO( "stage" ).x = ( _stocker.getDO( "stage" ).canvas.width / 2 ) + Math.floor( Math.random() * d ) - ( d/2 );
      _stocker.getDO( "stage" ).y = ( _stocker.getDO( "stage" ).canvas.height / 2 ) + Math.floor( Math.random() * d ) - ( d/2 );
      d -= 1;
      if( d < 0 ) {
        clearInterval( iID );
      }
    }, 10 );
  }

  /**
  * 勝敗結果
  */
  function setResult( result ) {
    if( result ) {
      //勝利
      var enemyDedMask = _stocker.getDO( "enemyContainer" ).getChildAt( 1 );
      enemyDedMask.visible = true;
      _stocker.getDO( "winText" ).scaleX = _stocker.getDO( "winText" ).scaleY = 0;
      _stocker.getDO( "winText" ).visible = true;
      createjs.Tween.get( _stocker.getDO( "winText" ) )
      .to( { scaleX: 1, scaleY: 1, }, 400, createjs.Ease.backOut )
      .call( function() {
        setNextArrow( true );
        _contentsCompleteCallback();
      } );
      _startParticle();
    } else {
      //敗北
      _stocker.getDO( "loseText" ).y = -700;
      _stocker.getDO( "loseText" ).visible = true;
      createjs.Tween.get( _stocker.getDO( "loseText" ) )
      .to( { y: -200, }, 600, createjs.Ease.bounceOut )
      .call( function() {
        setNextArrow( true );
        _contentsCompleteCallback();
      } );
      setTimeout( function() {
       _stageShake();
      }, 300 );
    }
  }

  /**
  * パーティクルアニメーションスタート
  */
  function _startParticle() {
    function emit() {
      var len = 2;
      for(var i = 0; i < len; i++ ) {
        var par;
        if( Math.floor( Math.random() * 2 ) == 0 ) {
          par = _stocker.getDO( "particle001" ).clone();
        } else {
          par = _stocker.getDO( "particle002" ).clone();
        }
        par.x = ( Math.random() * _stocker.getDO( "stage" ).canvas.width ) - (_stocker.getDO( "stage" ).canvas.width / 2);
        par.y = ( Math.random() * _stocker.getDO( "stage" ).canvas.height ) - (_stocker.getDO( "stage" ).canvas.height / 2);
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
        _stocker.getDO( "stage" ).addChild( par );
      }
    }
    setInterval( emit, 200 );
  }

  /**
  * オープニングストップ
  */
  function stopOpening() {
    clearTimeout( _timeoutID );
    var enemy = _stocker.getDO( "enemyContainer" );
    enemy.x = 0;
    enemy.y =-200;
    _allRemoveInterval();
    var len = _stocker.getDO( "playerContainer" ).length;
    for( var i = 0; i < len; i++ ) {
      var p = _stocker.getDO( "playerContainer" )[ i ];
      p.y = 100;
    }
    _stocker.getDO( "enemyHPProgRed" ).scaleX = _utils.getPercentage( _paramater.getParam( "enemyData" ).max, _paramater.getParam( "enemyData" ).current, 99 );
    _stocker.getDO( "stage" ).removeChild( _stocker.getDO( "battleStartText" ) );
  }

  /**
  * スキルストップ
  */
  function stopSkill() {
    _allRemoveInterval();
    var len = _stocker.getDO( "playerBMContainer" ).length;
    for( var i = 0; i < len; i++ ) {
      var bmc = _stocker.getDO( "playerBMContainer" )[ i ];
      bmc.y = 0;
      var powerUP = bmc.getChildAt( 1 );
      var powerDown = bmc.getChildAt( 2 );
      var arrow = bmc.getChildAt( 3 );
      powerUP.visible = false;
      powerDown.visible = false;
      arrow.visible = false;

      var enemyBMC = _stocker.getDO( "enemyContainer" );
      enemyBMC.getChildAt( 2 ).visible = false;
      enemyBMC.getChildAt( 3 ).visible = false;

    }

    if( _fukidashi ) {
      _stocker.getDO( "stage" ).removeChild( _fukidashi );
      _fukidashi = null;
    }
  }

  /**
  * 全てのインターバルストップ
  */
  function _allRemoveInterval() {
    var len = _intervalID.length;
    for( var i = 0; i < len; i++ ) {
      clearInterval( _intervalID[ i ] );
    }
    _intervalID = new Array();
  }

  /**
  * ダメージ数値表示
  */
  function _setDamage( num, x, y, s ) {

    _setDamageEffect001( x, y );
    _setDamageEffect002( x, y );

    _setGion( x, y, s );

    var con = new createjs.Container();

    var num_str = num.toString();
    var num_arr = num_str.split('');

    var len = num_arr.length;
    for( var i = 0; i < len; i++ ) {
      var num = num_arr[ i ];
      var bm = _stocker.getDO( "num_d_List" )[ num ].clone();
      bm.scaleX = bm.scaleY = 0.4;
      bm.x = (( i + 1 ) * 25) - ((( len + 1 ) * 25)/2);
      con.x = x; con.y = y;
      con.addChild( bm );
      _stocker.getDO( "stage" ).addChild( con );
    }
    createjs.Tween.get( con )
    .to( { y: con.y - 10 }, 1000, createjs.Ease.sinOut )
    .call( function(){
      _stocker.getDO( "stage" ).removeChild( this );
    });
    createjs.Tween.get( con )
    .to( { alpha: 1 }, 300, createjs.Ease.sinOut )
    .wait( 300 )
    .to( { alpha: 0 }, 300, createjs.Ease.sinOut );
    con.alpha = 0;
  }

  /**
  * ダメージエフェクト
  */
  function _setDamageEffect001( x, y ) {
    var attack001 = _stocker.getDO( "attack001" ).clone();
    attack001.scaleX = attack001.scaleY = 0.9;
    attack001.x = x;
    attack001.y = y;
    _stocker.getDO( "stage" ).addChild( attack001 );

    createjs.Tween.get( attack001 )
    .to( { scaleX: 1, scaleY: 1 }, 150, createjs.Ease.sinOut )

    createjs.Tween.get( attack001 )
    .to( { alpha: 1 }, 150, createjs.Ease.sinOut )
    .to( { alpha: 0 }, 100, createjs.Ease.sinIn );

    setTimeout( function(){
      _stocker.getDO( "stage" ).removeChild( attack001 );
    }, 250 );
  }

  /**
  * ダメージエフェクト波紋
  */
  function _setDamageEffect002( x, y ) {
    var attack002 = _stocker.getDO( "attack002" ).clone();
    attack002.scaleX = attack002.scaleY = 0.9;
    attack002.x = x;
    attack002.y = y;
    _stocker.getDO( "stage" ).addChild( attack002 );

    createjs.Tween.get( attack002 )
    .to( { scaleX: 1, scaleY: 1 }, 150, createjs.Ease.sinOut )

    createjs.Tween.get( attack002 )
    .to( { alpha: 1 }, 50, createjs.Ease.sinOut )
    .to( { alpha: 0 }, 100, createjs.Ease.sinIn );

    setTimeout( function(){
      _stocker.getDO( "stage" ).removeChild( attack002 );
    }, 150 );
  }


  /**
  * ダメージ擬音表示
  */
  function _setGion( x, y, s ) {
    var gion;
    switch( Math.floor( Math.random() * 3 ) ) {
      case 0:
        gion = _stocker.getDO( "gion001" ).clone();
        break;
      case 1:
        gion = _stocker.getDO( "gion002" ).clone();
        break;
      case 2:
        gion = _stocker.getDO( "gion003" ).clone();
        break;
    }

    gion.scaleX = gion.scaleY = s;
    gion.x = x; gion.y = y;
    _stocker.getDO( "stage" ).addChild( gion );

    var count = 0;
    var intervalID = setInterval( function( x, y, et ) {
      gion.x = x + ( Math.random() * 30 - 15 ) ;
      gion.y = y + ( Math.random() * 30 - 15 );
      count++;

      var ct = new Date().getTime();
      if( et <= ct ) {
        clearInterval(intervalID);
        intervalID = null;
        _stocker.getDO( "stage" ).removeChild( gion );
      }
    }, 40 / 1000, x, y, new Date().getTime() + 500 );
  }

  /**
  * 次へのアクションを促す矢印表示
  */
  var _nextArrowIntervalID;
  function setNextArrow( flg ) {
    var count = 0;
    if( flg ) {
      _nextArrowIntervalID = setInterval( function() {
        _stocker.getDO( "yajirushiDown" ).y = Math.sin( count * 4 ) + 390;
        count += 0.1;
      }, 30 );
      _stocker.getDO( "yajirushiDown" ).visible = true;
    } else {
      clearInterval( _nextArrowIntervalID );
      _stocker.getDO( "yajirushiDown" ).visible = false;
    }
  }


  var exports = {};
  exports.init = init;
  exports.setOpening = setOpening;
  exports.setSkillWords = setSkillWords;
  exports.setEnemySkill = setEnemySkill;
  exports.setTurn = setTurn;
  exports.playerDamage = playerDamage;
  exports.bossDamage = bossDamage;
  exports.setResult = setResult;

  exports.stopOpening = stopOpening;
  exports.stopSkill = stopSkill;
  exports.setNextArrow = setNextArrow;

  return exports;

}());
