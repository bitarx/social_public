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

function dispProgressQuestExp(exp)
{
    $('#progQuestExp').html( '<img src="' + BASE_URL + 'img/progress_green.png" width="' + exp + '%" height="20px">' );
    $('#progQuestExp').show(); 
     
}

/**
 * カードの経験値を表示
 *
 * @author imanishi 
 * @param int 経験値
 * @param int リスト表示時の連番
 * @return void 
 */
function dispProgressCardExp(exp, num = 0)
{
    $('#progCardExp' + num).html( '<img src="' + BASE_URL + 'img/progress_green.png" width="' + exp + '%" height="20px">' );
    $('#progCardExp' + num).show(); 
     
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
           filename = 'card_get_on.png';
           image = '<img src="' + IMG_URL + 'tutorial/card_s_31.jpg" width="160px">'; 
           str = data.name + 'が仲間に加わった！';
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
