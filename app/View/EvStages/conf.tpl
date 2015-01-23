<div class="stages">
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            <{$data.card_name}>
        </div>
    </div>
    <div>
        <img src="<{$smarty.const.IMG_URL}>enemy/enemy_<{$data.enemy_id}>.jpg" >
    </div>
    <{include file="../Elements/before_words.tpl"}>
        <div  class="btnQuestBossBattle">
        <a href="<{$smarty.const.BASE_URL}>EvStages/act?target_id=<{$data.enemy_id}>&ev_stage_id=<{$stageId}>">
            <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
            <div class="strQuestBossBattle">
                鎮激開始！
            </div>
        </a>
        </div>
    <{if !empty($noCard)}>
        <div class="spaceHigh"></div>
        <div style="position:relative;color:#FF0000;text-align:center;">
            <span style="#FF0000">デッキにカードがセットされていません</span>
        </div>
    <{/if}>


    <div class="spaceHigh"></div>

    <div class="spaceHigh"></div>
    <{include file="../Elements/gacha_bn.tpl"}>
    <div class="space"></div>
</div>
