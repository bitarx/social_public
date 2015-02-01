<div class="commonDisplayH">
    <{include file="../Elements/title.tpl"}>

    <div class="parent">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            使用完了
        </div>
    </div>

    <div style="position:relative;top:30px;height:60px;text-align:center;">
        <{$data.detail_after}>
    </div>

    <div class="spaceHigh"></div>

    <div class="parent">
        <{if $itemData.item_id <= 4}>
            <a href="<{$smarty.const.BASE_URL}>RaidQuests/index">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
                <div class="child" >
                   レイドバトルへ 
                </div>
            </a>
        <{else}>
            <a href="<{$smarty.const.BASE_URL}>Quests/index">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
                <div class="child" >
                   ミッションへ 
                </div>
            </a>
        <{/if}>
    </div>

    <div class="spaceHigh"></div>

</div>
