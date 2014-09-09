/**
 * ページが読み込まれたら実行する処理を記述
 */
$(function(){

    $("#loading").hide();

    $("#appReq").bind('click' , appRequest);

/*
    $("a").vclick(function() {

        var data = new Array();
        data['act'] = $(this).attr("act");
        data['params'] = $(this).attr("params");
        data['type'] = $(this).attr("params");
        appRequest(data);
    });
*/
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

