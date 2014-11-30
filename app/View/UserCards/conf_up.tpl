<div style="position:relative">
    <{include file="../Elements/title.tpl"}>
    <div class="parent">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            強化確認
        </div>
    </div>
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
        <form method=="POST" action="actUp">
            <div class="btnUpComp">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    合成実行
                </div>
            </div>
    <{/if}>
    <div class="space"></div>

    <div class="parent">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  class="subjectImg">
        <div class="child">
           選択された素材
        </div>
    </div>

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
            <div class="btnUpComp">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    合成実行
                </div>
            </div>
        </form>
    <{/if}>
    <div class="spaceHigh"></div>
</div>
