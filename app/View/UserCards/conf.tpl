<div style="position:relative">
    <{include file="../Elements/title.tpl"}>
    <div class="subTitle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            進化確認
        </div>
    </div>
    <{include file="../Elements/card.tpl"}>

    <div class="subTitleMiddle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  height="32px" width="680px">
        <div class="subTitleMiddleStr">
           選択された素材
        </div>
    </div>

    <{foreach from=$list item=data key=k}>
        <{include file="../Elements/card.tpl"}>
    <{/foreach}>

    <{include file="../Elements/line.tpl"}>

    <div class="synthConfMsg">
        所持<{$smarty.const.MONEY_NAME}>:<{$userParam.money}><br /> 
        <span style="color:#FF4500;">必要<{$smarty.const.MONEY_NAME}>:<{$useMoney}></span> 
    </div>

    <{if !$judgeEvol}> 
        <div style="text-align:center;">
            進化できません。
        </div>
    <{elseif !$money}> 
        <div style="text-align:center;">
            <{$smarty.const.MONEY_NAME}>が足りません。
        </div>
    <{else}>
    <a href="<{$smarty.const.BASE_URL}>UserCards/actEvol?user_card_id=<{$data.user_card_id}>">
        <div class="btnSelectSt">
            <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
            <div class="strSelectStComp">
                合成する
            </div>
        </div>
    </a>
    <{/if}>

</div>
