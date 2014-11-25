<div class="cardDetail"> 
    <{if !empty($hasCard)}>
        <{include file="../Elements/card_detail.tpl"}>
        <{if !empty($stageId)}>
            <div class="parent">
                <a href="<{$smarty.const.BASE_URL}>Stages/main?stage_id=<{$stageId}>">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
                    <div class="child" >
                       ミッションへ 
                    </div>
                </a>
            </div>
            <div class="space"></div>
        <{/if}>
        <div class="parent">
            <a href="<{$linkUserCard}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
                <div class="child" >
                   強化進化一覧へ
                </div>
            </a>
        </div>
    <{else}>
        <div class="space"></div>
        <{include file="../Elements/guide.tpl"}>
        <div class="space"></div>
        <div class="parent">
            <a href="<{$linkPbox}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
                <div class="child" >
                   受取BOXへ
                </div>
            </a>
        </div>
    <{/if}>
</div>
