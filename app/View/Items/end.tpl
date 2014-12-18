<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    <div class="parent">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            購入完了
        </div>
    </div>

    <div style="position:relative;top:30px;height:60px;text-align:center;">
        <{$data.item_name}>を購入しました。
    </div>

    <div class="space"></div>

    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserItems/conf/<{$userItemId}>">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
        <div class="child" >
           早速使う 
        </div>
        </a>
    </div>

    <div class="space"></div>
    <{include file="../Elements/line.tpl"}>
    <div class="space"></div>

</div>
