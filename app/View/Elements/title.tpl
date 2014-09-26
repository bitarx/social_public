<div class="bannerTitle">
    <img src="<{$smarty.const.IMG_URL}>banner_title.png">
    <{if 'UserCards' == $ctl}> 
        <div class="strTitleSynth" >
            強化進化
        </div>
    <{elseif 'UserBaseCards' == $ctl}> 
        <div class="strTitleBaseCard" >
            ベースカード変更
        </div>
    <{elseif 'UserDeckCards' == $ctl}> 
        <div class="strTitleDeckCard" >
            デッキ編成
        </div>
    <{elseif 'UserStages' == $ctl}> 
        <div class="strTitleDeckCard" >
            シーン鑑賞
        </div>
    <{elseif 'UserPresentBoxes' == $ctl}> 
        <div class="strTitleDeckCard" >
           受取BOX 
        </div>
    <{elseif 'Gachas' == $ctl && 'comp' == $action}> 
        <div class="strTitleDeckCard" >
           ガチャ結果 
        </div>
    <{elseif 'Gachas' == $ctl}> 
        <div class="strTitleGacha" >
           ガチャ 
        </div>
    <{elseif 'Items' == $ctl}> 
        <div class="strTitleSynth" >
           ショップ
        </div>
    <{elseif 'UserItems' == $ctl}> 
        <div class="strTitleSynth" >
           アイテム
        </div>
    <{else}>
        <div class="strCommonTitle" >
            <{$title}>
        </div>
    <{/if}>
</div>
