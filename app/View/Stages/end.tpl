<div class="commonDisplay">
    <div>
        <img src="<{$smarty.const.IMG_URL}>quest/epilogue_<{$data['quest_id']}>.jpg">
    </div>

    <div class="guideXL">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_1.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="445px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpperEnd">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnder4XL">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiTextEnd">
                <{$data['detail_after']}>
            </div>
        </div>
    </div>
    <div class="spaceHigh"></div>
    <div class="parent">
        <a href="<{$linkQuest}>">
            <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
            <div class="child" >
                次の鎮激へ
            </div>
        </a>
    </div>
    <div class="spaceHigh"></div>
</div>
