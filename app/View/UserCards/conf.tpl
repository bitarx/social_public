<div>
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>

    <{include file="../Elements/line.tpl"}>

    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
    <{/foreach}>

    <{include file="../Elements/line.tpl"}>

    <a href="<{$smarty.const.BASE_URL}>UserCards/actUp?user_card_id=<{$data.user_card_id}>">
        <div class="btnSelectSt">
            <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
            <div class="strSelectStComp">
                合成する
            </div>
        </div>
    </a>

</div>
