/**
 * サーバより返された結果により処理を切り分ける
 *
 * @auther imanishi
 * @since 2014/03/20
 * @param object data Appサーバより返された結果
 * @return void
 */
function routes(data)
{
    var ret = isJSON (data); 
    if (ret) {
        data = JSON.parse(data);
    }
    if (data.result == "2") {
        $('#errMes').html( '不正なリクエストです' );
        $('#errMes').show(); 
    } 
    // ステージクリア
     else if (data.stage_clear == "1") {

        location.href = BASE_URL + 'Stages/conf?stage_id=' + data.stage_id;    
    } 
     else {

        switch(data.action)
        {
            case 'Stages_init':
                dispProgressQuest(data.progress);
                dispProgressQuestAct(data.act);
                dispProgressQuestExp(data.exp);
                dispRotResultQuest(data);
                break;
            case 'Tutorials_quest':
                if (data.tuto_next == '1') {
                    // クエスト演出終了し次へ
                    location.href = BASE_URL + 'Tutorials/tutorial_5';    
                }
                dispProgressQuest(data.progress);
                dispProgressQuestAct(data.act);
                dispProgressQuestExp(data.exp);
                dispRotResultQuest(data);
                break;
            default:
                $('#errMes').html( '不正なリクエストです' );
                $('#errMes').show(); 
        }
    }
}


function dispProgressQuest(prog)
{
    $('#progQuestMain').html( '<img src="' + BASE_URL + 'img/progress_blue.png" width="' + prog + '%" height="20px">' );
    $('#progQuest').show(); 
     
}

/**
 * クエストの行動力を表示
 *
 * @author imanishi 
 * @param int 行動力値
 * @return void 
 */
function dispProgressQuestAct(act)
{
    $('#progQuestAct').html( '<img src="' + BASE_URL + 'img/progress_yellow.png" width="' + act + '%" height="20px">' );
    $('#progQuestAct').show(); 
     
}

/**
 * クエストの経験値を表示
 *
 * @author imanishi 
 * @param int 行動力値
 * @return void 
 */
function dispProgressQuestExp(exp)
{
    $('#progQuestExp').html( '<img src="' + BASE_URL + 'img/progress_green.png" width="' + exp + '%" height="20px">' );
    $('#progQuestExp').show(); 
     
}


function dispRotResultQuest(data)
{

    if (undefined == data) { 
        var kind = "99";
    } else {
        var kind = data.kind;
    }

    var str = "";
    var image = "";
    var filename = 'card_prog_on.png';
    switch(kind)
    {
       // カード
       case "1":
           if (1 == data.tuto) {
               image = '<img src="' + IMG_URL + 'tutorial/card_s_' + data.target + '.jpg" width="160px">'; 
               str = data.name + 'が仲間に加わった！';
           } else {
               image = '<img src="' + FILEOUT_URL + '?size=s&dir=card&target=' + data.target + '" width="160px">'; 
               str = '<a href="' + BASE_URL + 'cards/index/' + data.target + '?stage_id=' + data.stage_id + '">' + data.name + 'が仲間に加わった！</a>';
           }
           filename = 'card_get_on.png';
           break;
       // 金庫
       case "2":
           filename = 'card_kinko_on.png';
           break;
       // ゴールド
       case "3":
           filename = 'card_gold_on.png';
           str = data.num + 'ゴールド手に入れた！';
           break;
       // 敵
       case "4":
           filename = 'card_enemy_on.png';
           break;
       // 全力進行    
       case "5":
           filename = 'card_bestprog_on.png';
           break;
       // 出会い
       case "6":
           filename = 'card_bestprog_on.png';
           break;
       // カードの裏
       case "99":
           filename = 'card_back.png';
           break;
       // 何も出ないときはデッキセットキャラがメッセージを発する
       default:
           image = '<div class="guide">';
           image += '<div class="guideImg">';
           image +=     '<img src="' + FILEOUT_URL + '?size=s&dir=card&target=' + data.target + '" width="160px">'; 
           image += '</div>';
           image += '<div class="guideFukidashi">';
           image += '<div class="guideFukiMiddle">';
           image +=     '<img src="' + IMG_URL + 'fukidashi_middle.png" width="420px" height="147px">';
           image += '</div>';
           image += '<div class="guideFukiLeft">';
           image +=     '<img src="' + IMG_URL + 'fukidashi_left_side.png" width="20px">';
           image += '</div>';
           image += '<div class="guideFukiUpper">';
           image +=     '<img src="' + IMG_URL + 'fukidashi_upper.png" width="420px">';
           image += '</div>';
           image += '<div class="guideFukiUnder">';
           image +=     '<img src="' + IMG_URL + 'fukidashi_under.png" width="420px">';
           image += '</div>';
           image += '<div class="guideFukiText">';
           image +=     '<span style="color:#000000;">' + data.name + '</span>'; 
           image += '</div>';
           image += '</div>';
           image += '</div>';
           break; 
    } 
    // クエストカード
    $('#lotResultQuest').html( '<img src="' + BASE_URL + 'img/' + filename  + '">' );
    $('#lotResultQuest').show(); 

    // 結果イメージ等
    $('#lotResultDataQuest').html(image);
    $('#lotResultDataQuest').show(); 

    // 文言等
    $('#strLotResultDataQuest').html(str);
    $('#strLotResultDataQuest').show(); 
}

/**
 * カードの経験値を表示
 *
 * @author imanishi 
 * @param int 経験値
 * @param int リスト表示時の連番
 * @return void 
 */
function dispProgressCardExp(exp,num)
{
    $('#progCardExp' + num).html( '<img src="' + BASE_URL + 'img/progress_green.png" width="' + exp + '%" height="20px">' );
    $('#progCardExp' + num).show(); 
     
}
