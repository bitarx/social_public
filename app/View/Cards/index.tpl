<div class="cardDetail"> 
    <{include file="../Elements/card_detail.tpl"}>
    <{if !empty($stageId)}>
        <div class="parent">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <a href="<{$smarty.const.BASE_URL}>Stages/main?stage_id=<{$stageId}>">
            <div class="child" >
               ミッションへ 
            </div>
            </a>
        </div>
        <div class="space"></div>
    <{/if}>
    <div class="parent">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
        <a href="<{$linkUserCard}>">
        <div class="child" >
           強化進化一覧へ
        </div>
        </a>
    </div>
</div>
