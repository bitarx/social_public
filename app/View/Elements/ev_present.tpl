<div class="evPresentBlock">
    <div class="evPresentImg">
       <{if $smarty.const.KIND_CARD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.target}>.jpg" width="120px">
       <{elseif $smarty.const.KIND_ITEM == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.target}>.png" width="120px">
       <{elseif $smarty.const.KIND_GOLD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/gold.png" width="120px">

       <{/if}>
    </div>
    <div class="presentName">
        <span style="color:#FFA500"><{$data.title}></span><{$data.name}><{if $data.kind != $smarty.const.KIND_GOLD}> × <{$data.num}><{/if}></span>
    </div>
    <{if $data.target == 88}>
        <div style="position:absolute;top:150px;left:15px;">
    <{else}>
        <div style="position:absolute;top:120px;left:15px;">
    <{/if}>
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
</div>
