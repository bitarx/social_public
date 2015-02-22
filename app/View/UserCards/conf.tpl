<div style="position:relative">
    <{include file="../Elements/title.tpl"}>

    <{include file="../Elements/card.tpl"}>

    <div class="space"></div>

    <{include file="../Elements/sub_title.tpl"}>

    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
    <{/foreach}>

    <{include file="../Elements/line.tpl"}>

    <div class="synthConfMsg">
        所持<{$smarty.const.MONEY_NAME}>:<{$userParam.money}><br /> 
        <span style="color:#FF4500;">必要<{$smarty.const.MONEY_NAME}>:<{$useMoney}></span> 
    </div>

    <{if !$judgeEvol}> 
            <{if 0 === $judgeEvol}>
                <div style="text-align:center;">
                    これ以上進化できません
                </div>
            <{else}>
                <{include file="../Elements/guide.tpl"}>
            <{/if}>
            <div class="parent">
                <a href="<{$smarty.const.BASE_URL}>UserCards/index?kind=2">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="child">
                        戻る
                    </div>
                </a>
            </div>
    <{elseif !$money}> 
        <div style="text-align:center;">
            <{$smarty.const.MONEY_NAME}>が足りません
        </div>
        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>UserCards/index?kind=2">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="child">
                    戻る
                </div>
            </a>
        </div>
    <{else}>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserCards/actEvol?user_card_id=<{$data.user_card_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
            <div class="child">
                進化合成！
            </div>
        </a>
    </div>
    <{/if}>
    <div class="spaceHigh"></div>
</div>
