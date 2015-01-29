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

    <{include file="../Elements/sub_title.tpl"}>

    <div class="space"></div>
    <{if !empty($helpList)}>
        <{foreach from=$helpList item=data}>
            <{include file="../Elements/help.tpl"}>
        <{/foreach}>
    <{else}>
        <div style="position:relative;text-align:center;height:80px;">
            参戦要請はありません
        </div>
    <{/if}>

    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>

    <{include file="../Elements/friend_invite.tpl"}>

    <{if !empty($event)}>
        <{include file="../Elements/event.tpl"}>
    <{/if}>

    <div class="spaceLow"></div>
    <{include file="../Elements/gacha_bn.tpl"}>
    <div class="spaceLow"></div>
</div>
