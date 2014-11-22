<div>
    <{include file="../Elements/title.tpl"}>

    <div class="center">
        <span style="color:#FFA500">デッキコスト</span> <{$cost}> / <{$costAtk}>
    </div>

    <{if !empty($data.user_card_id)}>
        <{include file="../Elements/card.tpl"}>
    <{else}> 
        <div class="strNoSetting">
        デッキ<{$deck_number}>
        設定なし
        </div>
    <{/if}> 
    <{if !empty($over)}>
        <div class="costOver">
           コストオーバーの為設置できません。 
        </div>
    <{/if}> 
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserDeckCards/index">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
            <div class="child" >
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
