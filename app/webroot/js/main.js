/**
 * ページが読み込まれたら実行する処理を記述
 */
$(function(){

    $("#loading").hide();

    $("#appReq").on('click ' , appRequest);

    $(document).on('click ' , '#play', playVoice);
});


/**
 * サーバーへリクエスト送信
 *
 * @author imanishi
 * @since 2014/03/21
 *
 * @param object
 * @return void
 */
function appRequest(e){

    var act = $(this).attr("act");
    var params = $(this).attr("params");
    var method = $(this).attr("method");
//    $("#loading").show();

    var url =  BASE_URL + act;
    var obj = 'params=' + params;
    if (undefined == method) {
        method = 'get';
    }
    var type = method;
    var output_id =  '#errMes';

    //  jQuery.ajax
    $.ajax({
        url: url,   
        data: obj,
        type: type, 

        success: function( data, textStatus, jqXHR ) {
           routes(data);
        },
        error: function (request, status, error) {

            $(output_id).html( request.responseText );
            $(output_id).show();
        }
    });
}


/**
 * ページ取得
 *
 * @return string 対象GETパラメータ
 */
function getPage() {
    var url   = location.href;
    var params = getParam();
    
    var page = params['dir'] + '/' + params['file'];
    return page;
}


/**
 * GETパラメータ取得
 *
 * @param string key
 * @return string 対象GETパラメータ
 */
function getParam(key) {
    var url   = location.href;
    parameters    = url.split("?");

    var paramsArray = [];

    if (parameters[1] == undefined) {

        paramsArray['dir']  = 'main';
        paramsArray['file'] = 'top';

    } else {

        params   = parameters[1].split("/");

        for ( i = 0; i < params.length; i++ ) {
            if (i == 0) {
                paramsArray['dir'] = params[0];
            } else if (i == 1) {
                paramsArray['file'] = params[1];
            } else if (i%2 == 0) {
                paramsArray[params[i]] = "";
            } else if (i%2 == 1) {
                paramsArray[params[i-1]] = params[i];
            }
        }
    }

    var ret = null;

    if (key != null) {
        ret = paramsArray[key];
    } else {
        ret = paramsArray;
    }
    return ret;
}


/**
 * JSON判定
 */
var isJSON = function(arg) {
    arg = (typeof arg === "function") ? arg() : arg;
    if (typeof arg  !== "string") {
        return false;
    }
    try {
    arg = (!JSON) ? eval("(" + arg + ")") : JSON.parse(arg);
        return true;
    } catch (e) {
        return false;
    }
};



  function countDown(dateStr) {
      if ("" == dateStr) return;
      var startDateTime = new Date();
      var endDateTime = new Date(dateStr);
      var left = endDateTime - startDateTime;
      var a_day = 24 * 60 * 60 * 1000;

    // 期限から現在までの『残時間の日の部分』
      var d = Math.floor(left / a_day) 

    // 期限から現在までの『残時間の時間の部分』
      var h = Math.floor((left % a_day) / (60 * 60 * 1000)) 

    // 残時間を秒で割って残分数を出す。
    // 残分数を60で割ることで、残時間の「時」の余りとして、『残時間の分の部分』を出す
      var m = Math.floor((left % a_day) / (60 * 1000)) % 60 

    // 残時間をミリ秒で割って、残秒数を出す。
    // 残秒数を60で割った余りとして、「秒」の余りとしての残「ミリ秒」を出す。
    // 更にそれを60で割った余りとして、「分」で割った余りとしての『残時間の秒の部分』を出す
      var s = Math.floor((left % a_day) / 1000) % 60 % 60 

      var str = "";
      if (0 != d) str += d + '日';
      if (0 != h) str += h + '時間';
      if (0 != m) str += m + '分';
      str += s + '秒';

      if ( s < 0 ) {
          str = 0 + '秒';
      }

      $("#TimeLeft").text(str);
        setTimeout('countDown("' + dateStr + '")', 1000);
  }

/**
 * Voiceを再生する
 */
function playVoice(e) {

    $(document).off("click");

    var fname = $(this).attr("src");
    var audio = new Audio(fname);
    audio.load();

    audio.addEventListener('canplaythrough', function() {
        audio.play();
    }, false);

    audio.addEventListener("ended", function() {
        $(document).on('click ' , '#play', playVoice);
    }, false);
}
