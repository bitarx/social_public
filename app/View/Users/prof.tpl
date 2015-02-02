<{include file="../Elements/title.tpl"}>
<div class="mypage">
    <{if empty($notDisp)}>
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
    <{include file="../Elements/prof.tpl"}>

    <div class="space"></div>

    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>

    <div class="spaceLow"></div>
    <{include file="../Elements/gacha_bn.tpl"}>
    <div class="spaceLow"></div>
    <{else}>
        <div class="space"></div>
        <{include file="../Elements/guide.tpl"}>
        <div class="spaceHigh"></div>
        <div class="parent">
            <a href="<{$linkUser}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" name="submit">
            <div class="child">
                マイページへ
            </div>
            </a>
        </div>
        <div class="spaceHigh"></div>
    <{/if}>
</div>
