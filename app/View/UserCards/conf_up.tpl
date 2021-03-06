<div style="position:relative">
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>
    <{include file="../Elements/line.tpl"}>

    <div class="synthConfMsg">
        所持<{$smarty.const.MONEY_NAME}>:<{$userParam.money}><br /> 
        <span style="color:#FF4500;">必要<{$smarty.const.MONEY_NAME}>:<{$useMoney}></span> 
    </div>
    <div class="space"></div>

    <{if !$money}> 
        <div style="text-align:center;">
            <{$smarty.const.MONEY_NAME}>が足りません。
        </div>
    <{elseif !empty($levelMax)}>
        <div style="text-align:center;">
            レベル最大の為これ以上強化できません。
        </div>
    <{else}>
        <form method="post" action="<{$smarty.const.BASE_URL_PRE}>UserCards/actUp">
            <div class="parent">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_synth_comp.png" alt="強化実行" name="submit">
            </div>
    <{/if}>
    <div class="space"></div>

    <{include file="../Elements/sub_title.tpl"}>

    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
        <input type="hidden" name="user_card_id_<{$data.user_card_id}>" value="<{$data.user_card_id}>">
    <{/foreach}>

    <{include file="../Elements/line.tpl"}>
    <div class="synthConfMsg">
        所持<{$smarty.const.MONEY_NAME}>:<{$userParam.money}><br /> 
        <span style="color:#FF4500;">必要<{$smarty.const.MONEY_NAME}>:<{$useMoney}></span> 
    </div>
    <{if !$money}> 
        <div style="text-align:center;">
            <{$smarty.const.MONEY_NAME}>が足りません。
        </div>
    <{elseif !empty($levelMax)}>
        <div style="text-align:center;">
            レベル最大の為これ以上強化できません。
        </div>
    <{else}>
            <div class="space"></div>
            <div class="parent">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_synth_comp.png" alt="強化実行" name="submit">
            </div>
        </form>
    <{/if}>
    <div class="spaceHigh"></div>
</div>
