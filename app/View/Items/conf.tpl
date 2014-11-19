<div style="position:relative">
    <{include file="../Elements/title.tpl"}>
    <div class="subTitle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            購入確認
        </div>
    </div>
    <{include file="../Elements/card.tpl"}>

    <div class="subTitleMiddle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  height="32px" width="680px">
        <div class="subTitleMiddleStr">
           選択されたアイテム
        </div>
    </div>

    <{include file="../Elements/item.tpl"}>

    <{include file="../Elements/line.tpl"}>

    <div class="synthConfMsg">
        所持<{$smarty.const.POINT_NAME}>:<{$userParam.point}><br /> 
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
    <div class="btnSelectSt">
        <a href="<{$smarty.const.BASE_URL}>UserCards/actEvol?user_card_id=<{$data.user_card_id}>">
            <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
            <div class="strSelectStComp">
                購入する
            </div>
        </a>
    </div>
    <{/if}>

</div>
