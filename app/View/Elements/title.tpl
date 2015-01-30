<div class="parent">
    <img src="<{$smarty.const.IMG_URL}>banner_title.png">
    <div class="child" >
    <{if 'UserCards' == $ctl}> 
        <{if 'index' == $action}>
            強化進化
        <{elseif 'cardList' == $action}>
            所有カード一覧 
        <{/if}>
    <{elseif 'UserBaseCards' == $ctl}> 
        ベースカード変更
    <{elseif 'UserDeckCards' == $ctl}> 
        デッキ編成
    <{elseif 'UserStages' == $ctl}> 
        シーン鑑賞
    <{elseif 'UserPresentBoxes' == $ctl}> 
        受取BOX 
    <{elseif 'Gachas' == $ctl && 'comp' == $action}> 
        ガチャ結果 
    <{elseif 'Gachas' == $ctl}> 
       ガチャ 
    <{elseif 'StaticPages' == $ctl}> 
       ヘルプ 
    <{elseif 'Items' == $ctl}> 
       ショップ
    <{elseif 'UserItems' == $ctl}> 
       アイテム
    <{else}>
       <{$title}>
    <{/if}>
    </div>
</div>
