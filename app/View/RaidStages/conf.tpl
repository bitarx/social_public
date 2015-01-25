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
    <div  class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/act?target_id=<{$data.enemy_id}>&stage_id=<{$stageId}>&at=1">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="child">
                    通常攻撃
                </div>
        </a>
    </div>
    <div class="space"></div>
    <div  class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/act?target_id=<{$data.enemy_id}>&stage_id=<{$stageId}>&at=2">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="child">
                    攻撃力２倍
                </div>
        </a>
    </div>
    <div class="space"></div>
    <div  class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/act?target_id=<{$data.enemy_id}>&stage_id=<{$stageId}>&at=6">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="child">
                    攻撃力６倍
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
