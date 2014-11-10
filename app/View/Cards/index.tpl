<div class="cardDetail"> 
    <{include file="../Elements/card_detail.tpl"}>
    <{if !empty($stageId)}>
        <div class="changeBase">
            <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <a href="<{$smarty.const.BASE_URL}>Stages/main?stage_id=<{$stageId}>">
            <div class="strCardView" >
               ミッションへ 
            </div>
            </a>
        </div>
    <{/if}>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
        <a href="<{$linkUserCard}>">
        <div class="strCardView" >
           強化進化一覧へ
        </div>
        </a>
    </div>
</div>
