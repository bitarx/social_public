<div>
    <{include file="../Elements/title.tpl"}>
    <{if !empty($data.user_card_id)}>
        <{include file="../Elements/card.tpl"}>
    <{else}> 
        <div class="strNoSetting">
        デッキ<{$deck_number}>
        設定なし
        </div>
    <{/if}> 
    <div class="btnDeckBack">
        <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
        <a href="<{$smarty.const.BASE_URL}>UserDeckCards/index">
        <div class="strDeckBack" >
            戻る
        </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>

    <{include file="../Elements/sort.tpl"}>
    
    <{include file="../Elements/paging.tpl"}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/card.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
    
        <{include file="../Elements/pagingNum.tpl"}>
</div>