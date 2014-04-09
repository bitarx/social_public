<div style="position:relative">
    <{include file="../Elements/title.tpl"}>
    <div class="subTitle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            強化確認
        </div>
    </div>
    <{include file="../Elements/card.tpl"}>

    <div class="synthConfMsg">
        所持<{$smarty.const.MONEY_NAME}>:<{$userParam.money}><br /> 
        <span style="color:#FF4500;">必要<{$smarty.const.MONEY_NAME}>:<{$useMoney}></span> 
    </div>

    <{if !$money}> 
        <div style="text-align:center;">
            <{$smarty.const.MONEY_NAME}>が足りません。
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

    <div class="subTitleMiddle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  height="32px" width="680px">
        <div class="subTitleMiddleStr">
           選択された素材
        </div>
    </div>

    <{foreach from=$list item=data key=k}>
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
    <{else}>
            <div class="btnUpComp">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    合成実行
                </div>
            </div>
        </form>
    <{/if}>

</div>
