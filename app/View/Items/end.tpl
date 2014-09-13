<div style="position:relative;height:800px;">
    <{include file="../Elements/title.tpl"}>

    <div class="subTitle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            購入完了
        </div>
    </div>

    <div style="position:relative;top:30px;height:60px;text-align:center;">
        <{$data.item_name}>を購入しました。
    </div>

    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserItems/conf/<{$userItemId}>">
        <div class="strCommonButton" >
           早速使う 
        </div>
        </a>
    </div>

</div>
