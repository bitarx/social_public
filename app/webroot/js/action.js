/**
 * Appサーバより返された結果により処理を切り分ける
 *
 * @auther imanishi
 * @since 2014/03/20
 * @param object data Appサーバより返された結果
 * @return void
 */
console.log('action.js');
function routes(data)
{
console.log('routes');
console.log(data);
console.log(data.action);
console.log(data.kind);

    switch(data.action)
    {
        case 'Stages_init':
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


function dispProgressQuest(prog)
{
console.log('proggggggggggggggggggggg');
console.log(prog);
    $('#progQuest').html( '<img src="' + BASE_URL + 'img/progress_blue.png" width="' + prog + '%" height="20px">' );
    $('#progQuest').show(); 
     
}

function dispProgressQuestAct(act)
{
console.log('acttttttttttttttt');
console.log(act);
    $('#progQuestAct').html( '<img src="' + BASE_URL + 'img/progress_yellow.png" width="' + act + '%" height="20px">' );
    $('#progQuestAct').show(); 
     
}

function dispProgressQuestExp(exp)
{
console.log('acttttttttttttttt');
console.log(exp);
    $('#progQuestExp').html( '<img src="' + BASE_URL + 'img/progress_green.png" width="' + exp + '%" height="20px">' );
    $('#progQuestExp').show(); 
     
}

function dispRotResultQuest(data)
{
console.log('$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$');
console.log(data.kind);
console.log(data.name);
console.log(data.id);
    var kind = data.kind;
    var filename = 'card_prog_on.png';
    switch(kind)
    {
       // カード
       case "1":
           filename = 'card_get_on.png';
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
    }
    // カード
    $('#lotResultQuest').html( '<img src="' + BASE_URL + 'img/' + filename  + '">' );
    $('#lotResultQuest').show(); 

    // 文言等
    $('#lotResultDataQuest').html(str);
    $('#lotResultDataQuest').show(); 
}
