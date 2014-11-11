<div class="stages index">
    <div>
        <img src="<{$smarty.const.IMG_URL}>quest/main_<{$list[0]['quest_id']}>.jpg"> 
    </div>
    <div class="guideL">
        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_<{$guideId}>.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="275px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnder3XL">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               <{$list[0]['quest_detail']}> 
            </div>
        </div>
    </div>

    <div style="position:relative;">
    <{foreach from=$list item=val}>
        <div>
            <a href="<{$smarty.const.BASE_URL}>stages/initStage?stage_id=<{$val['stage_id']}> "><{$val['stage_id']}>. <{$val['stage_title']}> </a>
        </div>
    <{/foreach}>
    </div>
</div>
