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
            dispRotResultQuest(data.kind);
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

function dispRotResultQuest(kind)
{
    $('#lotResultQuest').html(kind);
    $('#lotResultQuest').show(); 
}
