<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="charset" content="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <title><{$smarty.const.SITE_TITLE}></title>
        <{if $carrer == $smarty.const.CARRER_IPHONE}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/scenario.css.php">
        <{else}>
            <link rel=stylesheet type="text/css" href="<{$smarty.const.BASE_URL}>css/scenario.css.php">
        <{/if}>
    </head>
    <body>
        <div id="main" class="userSelectNone">
            <canvas id="mainCanvas" width="640px" height="960px"></canvas>
            <ul id="listContainer" width="640px" height="960px"></ul>
            <p id="nameArea" ></p>
            <p id="textArea" ></p>
        </div>
    </body>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/easeljs-0.7.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>libs/preloadjs-0.4.1.min.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/scenario.js"></script>
    <script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/adjust.js"></script>

    <script type="text/javascript">
        //使用する画像リスト
        var images = [
            { src: "<{$smarty.const.IMG_URL}>xD7ywE4p/scene_<{$data.enemy_id}>.jpg", id: "bg" },
        ];

        // キャラセリフ
        var eventData001 = [
            { text: "<{$data.after_win_words}>", name: "", bgID: "bg", charID: "" },
        ];


    </script>


    <script type="text/javascript">
        //コールバック
        //画像ローディングプログレスコールバック
        var imageLoadProgress = function( loaded ) {
            console.log( "imageLoadProgress", loaded );
        }

        //画像ローディング完了コールバック
        var imageLoadComplete = function() {
            console.log( "imageLoadComplete" );
        }

        //シナリオ完了
        var scenarioComplete = function( eventsID ) {
            console.log( "scenarioComplete", eventsID );
            location.href = "<{$smarty.const.URL_PRE}><{$smarty.const.BASE_URL}><{$next}>";
        }

        //分岐選択完了
        var selectionComplete = function( selectionID, eventsID, eventsData ) {
            console.log( "selectionComplete" );
        }

        //シナリオエラー
        var scenarioError = function() {
            console.log( "scenarioError" );
        }

    </script>


    <script type="text/javascript">

        //タッチイベント
        document.getElementById( 'mainCanvas' ).addEventListener( 'click', function( e ) {
            scenario.nextEvent();
        }, false);

        window.onload = function() {
            var canvasID = "mainCanvas"; //画像描画用CanvasのID
            var listContainerID = "listContainer"
            var nameAreaID = "nameArea"; //名前表示用の要素ID
            var textAreaID = "textArea"; //テキスト表示用の要素ID

            //テキストの１文字の表示スピード（1/1000秒）
            var eventSpeed = 25;

            //初期化
            scenario.init(
                canvasID,
                listContainerID,
                nameAreaID,
                textAreaID,
                images,
                eventSpeed,
                imageLoadProgress,
                imageLoadComplete,
                scenarioComplete,
                selectionComplete,
                scenarioError
            );

            scenario.setEventData( "events001", eventData001 );
      };

    </script>

    <script type="text/javascript">
        //スクロール停止
        document.ontouchmove = function( e ){
            event.preventDefault();
        }
    </script>


</html>
