<div class="mypage">
    <div class="deckCard1">
       <{if !empty($list.0.card_id)}>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=s&dir=card&target=<{$list.0.card_id}>" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard2">
       <{if !empty($list.1.card_id)}>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=s&dir=card&target=<{$list.1.card_id}>" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard3">
       <{if !empty($list.2.card_id)}>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=s&dir=card&target=<{$list.2.card_id}>" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard4">
       <{if !empty($list.3.card_id)}>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=s&dir=card&target=<{$list.3.card_id}>" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <div class="deckCard5">
       <{if !empty($list.4.card_id)}>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=s&dir=card&target=<{$list.4.card_id}>" width="128px" height="360px">
       <{else}>
           <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="128px" height="360px">
       <{/if}>
    </div>
    <{include file="../Elements/status.tpl"}>
</div>