<div>
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
        <div class="strChangeBase" >
            ベースカードを変更
        </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>

    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
        <a href="<{$smarty.const.BASE_URL}>UserCards/conf?user_card_id=<{$data.user_card_id}>">
            <div class="btnSelectCard">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCardSozai">
                    素材に選択
                </div>
            </div>
        </a>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>

</div>
