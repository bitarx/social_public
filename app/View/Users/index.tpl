<div class="mypage">
    <div class="deckCard1">
       <{if !empty($list.0.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$list.0.card_id}>.jpg" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard2">
       <{if !empty($list.1.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$list.1.card_id}>.jpg" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard3">
       <{if !empty($list.2.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$list.2.card_id}>.jpg" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard4">
       <{if !empty($list.3.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$list.3.card_id}>.jpg" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard5">
       <{if !empty($list.4.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$list.4.card_id}>.jpg" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <{include file="../Elements/status.tpl"}>

    <{if !empty($event)}>
        <div style="position:relative;left:20px;">
             <img src="<{$smarty.const.IMG_URL}>line.png">
        </div>
        <{include file="../Elements/event.tpl"}>
    <{/if}>
    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
    <div style="position:relative;height:285px;top:-60px;text-align:center;">
        <a href="<{$linkGacha}>">
        <div class="child">
            <img src="<{$smarty.const.IMG_URL}>banner/gacha_bn1.png" width="90%" height="90%">
        </div>
        </a>
    </div>
    <div class="spaceLow"></div>
</div>
