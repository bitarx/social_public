<div class="tutorials index">
    <img src="<{$smarty.const.IMG_URL}>tutorial/gametitle.png">
    <div class="guide">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_<{$guideId}>.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="208px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnderXL">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               <{$row['tutorial_words']}><br />
            </div>
        </div>
    </div>
    <{include file="../Elements/next.tpl"}>
</div>
