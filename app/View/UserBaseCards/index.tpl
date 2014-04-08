<div class="userBaseCards index">
    <{include file="../Elements/title.tpl"}>
    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
        <a href="initBaseCard?user_card_id=<{$data.user_card_id}>">
            <div class="btnSelectCard">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCard">
                    ベースに選択
                </div>
            </div>
        </a>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
</div>
