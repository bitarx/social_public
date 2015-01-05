'use strict';
var scenario = (function() {
  var _canvas;
  var _listContainer;
  var _nameArea;
  var _textArea;
  var _stage;
  var _text;
  var _message;

  var _eventSpeed;
  var _intervalID;
  var _count = 0;

  //Bitmap
  var _bm;

  //stageItemBitmap
  var _bg;
  var _char;

  //イベント管理
  var _eventID;
  var _events;
  var _eventsID;

  //callBack
  var _imageLoadProgress;
  var _imageLoadComplete;
  var _scenarioComplete;
  var _selectionComplete;
  var _scenarioError;

  /*
   * 初期化.
  */
  function init( canvasID, listContainerID, nameAreaID, textAreaID, images, eventSpeed, imageLoadProgress, imageLoadComplete, scenarioComplete, selectionComplete, scenarioError ) {
    _canvas = document.getElementById( canvasID );
    _listContainer = document.getElementById( listContainerID );
    _nameArea = document.getElementById( nameAreaID );
    _textArea = document.getElementById( textAreaID );

    _stage = new createjs.Stage( _canvas );
    var matrix = _stage.getMatrix();
    matrix.translate( _canvas.width >> 1, _canvas.height >> -1 );
    matrix.decompose( _stage );

    var bgColor = new createjs.Shape();
    bgColor.graphics.beginFill( "#000000").drawRect( 0, 0, _canvas.width ,_canvas.height );
    bgColor.x = -_canvas.width / 2;
    _stage.addChild( bgColor );

    var queue = new createjs.LoadQueue( false );
    queue.loadManifest( images, true );
    queue.addEventListener( "complete", _imageLoadCompletehandler );
    queue.addEventListener( "progress", _imageLoadProgresshandler );

    _eventSpeed = eventSpeed;

    _imageLoadProgress = imageLoadProgress;
    _imageLoadComplete = imageLoadComplete;
    _scenarioComplete = scenarioComplete;
    _selectionComplete = selectionComplete;
    _scenarioError = scenarioError;

    _bg = new createjs.Bitmap();
    _stage.addChild( _bg );

    _char = new createjs.Bitmap();
    _stage.addChild( _char );

  }

  /*
   * データをセットし、イベントスタート.
  */
  function setEventData( eventsID, events ) {
    _eventID = 0;
    _eventsID = eventsID;
    _events = events;
    _listContainer.style.display = "none";

    if(_bm) {
      setEventById( 0 );
    }
  }

  /*
   * イベント進む.
  */
  function nextEvent() {
    _eventID++;
    if( _events[ _eventID ] ) {
      setEvent(
        _events[ _eventID ].text,
        _events[ _eventID ].name,
        _events[ _eventID ].bgID,
        _events[ _eventID ].charID,
        _events[ _eventID ].eventSpeed,
        _events[ _eventID ].selection
      )
    } else {
      _eventID = _events.length + 1;
      _scenarioComplete( _eventsID );
    }
  }

  /*
   * イベント戻る.
  */
  function prevEvent() {
    _eventID--;
    if( _events[ _eventID ] ) {
      setEvent(
        _events[ _eventID ].text,
        _events[ _eventID ].name,
        _events[ _eventID ].bgID,
        _events[ _eventID ].charID,
        _events[ _eventID ].eventSpeed,
        _events[ _eventID ].selection
      )
    } else {
      _eventID = -1;
      _scenarioError();
    }
  }

  /*
   * イベントIDを指定してイベントを開始.
  */
  function setEventById( id ) {
    if( _events[ id ] ) {
      _eventID = id;
      setEvent(
        _events[ _eventID ].text,
        _events[ _eventID ].name,
        _events[ _eventID ].bgID,
        _events[ _eventID ].charID,
        _events[ _eventID ].eventSpeed,
        _events[ _eventID ].selection
      )
    } else {
      _scenarioError();
    }
  }

  /*
   * イベント開始.
  */
  function setEvent( text, name, bgID, charID, eventSpeed, selection ) {
    if( name ) {
      _setName( name );
      _nameArea.style.display = "block";
    } else {
      _nameArea.style.display = "none";
    }

    if( text ) {
      if( eventSpeed ) {
        _setText( text, eventSpeed );
      } else {
        _setText( text );
      }
      _textArea.style.display = "block";
    } else {
      _textArea.style.display = "none";
    }

    if( bgID ) {
      _setBG( _bm[ bgID ] )
      _bg.visible = true;
    } else {
      _bg.visible = false;
    }
    if( charID ) {
      _setChar( _bm[ charID ] )
      _char.visible = true;
    } else {
      _char.visible = false;
    }

    if( selection ) {
      setSelectionData( "currentID", selection );
    }

    _stage.update();
  }

  /*
   * テキストセット.
  */
  function _setName( name ) {
    _nameArea.innerHTML = name;
  }

  /*
   * テキストセット.
  */
  function _setText( text, eventSpeed ) {
    _textArea.text = "";

    if( !eventSpeed ) {
      eventSpeed = _eventSpeed;
    }

    var currentText = "";
    var len = text.length;
    clearInterval( _intervalID )
    _count = 0;
    _intervalID = setInterval( function() {
      currentText += text[ _count ];
      if ( 0 == _count % 21 && 0 != _count) {
          currentText += "<br />"; 
      }
      _textArea.innerHTML = currentText;
      _count++;
      if( _count >= len ) {
        _textArea.innerHTML += '<div id="play" class="nextSign">▼</div>';
        clearInterval( _intervalID )
        _count = 0;
      }
    }, eventSpeed )
  }

  /*
   * バックグラウンドセット.
  */
  function _setBG( bm ) {
    _bg.image = bm.image;
    _bg.regX = _bg.image.width / 2;
    _stage.update();
  }

  /*
   * キャラクターセット.
  */
  function _setChar( bm ) {
    _char.image = bm.image;
    _char.regX = _char.image.width / 2, _char.regY = -( _canvas.height - _char.image.height)
    _stage.update();
  }

  /*
   * 画像ロードプログレスハンドラー.
  */
  function _imageLoadProgresshandler( e ) {
    _imageLoadProgress( e.loaded );
  }

  /*
   * 画像ロードコンプリートハンドラー.
  */
  function _imageLoadCompletehandler( e ) {
    var queue = e.currentTarget;
    queue.removeEventListener( "complete", _imageLoadCompletehandler );
    queue.removeEventListener( "progress", _imageLoadProgresshandler );
    _bm = {};
    for( var id in queue._loadItemsById ) {
      _bm[ id ] = new createjs.Bitmap( queue._loadItemsById[ id ].tag );
    }

    _eventID = 0;
    setEventById( 0 );

    _imageLoadComplete();
    _imageLoadProgress = null;
    _imageLoadComplete = null;

  }

  ////////////////////////////////////////////////////////////////
  //選択
  var _selectionList = null;
  var _selectionDataList = null;

  /*
   * テキストセット.
  */
  function setSelectionData( selectionID, selectionData ) {
    _removeSelectionData();
    _selectionList = [];
    _selectionDataList = [];
    for( var i in selectionData ) {
      var data = selectionData[ i ];
      var elm = document.createElement('li');
      elm.innerHTML = "<p>" + data.label + "</p>";
      elm.dataset.selectionID = data.selectionID;
      elm.dataset.eventsID = data.eventsID;
      _selectionDataList[ data.eventsID ] = data.eventsData;
      elm.addEventListener( "click", _selectionHandler );
      _selectionList.push( elm );
      _listContainer.appendChild( elm );
    }
    _listContainer.style.display = "block";
  }

  function _removeSelectionData() {
    if( _selectionList ) {
      for( var i in _selectionList ) {
        var elm = _selectionList[ i ];
        elm.removeEventListener( "click", _selectionHandler );
        _listContainer.removeChild( elm );
      }
    }
    _selectionList = null;
    _selectionDataList = null;
  }

  function _selectionHandler( e ) {
    _selectionComplete(
      e.currentTarget.dataset.selectionID,
      e.currentTarget.dataset.eventsID,
      _selectionDataList[ e.currentTarget.dataset.eventsID ]
    )
    scenario.setEventData( e.currentTarget.dataset.eventsID, _selectionDataList[ e.currentTarget.dataset.eventsID ] );
     _removeSelectionData();
  }
  ////////////////////////////////////////////////////////////////

  var exports = {};
  exports.init = init;
  exports.setEventData = setEventData;
  exports.setSelectionData = setSelectionData;
  exports.setEvent = setEvent;
  exports.setEventById = setEventById;
  exports.nextEvent = nextEvent;
  exports.prevEvent = prevEvent;
  return exports;
}());
