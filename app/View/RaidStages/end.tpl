<div class="commonDisplay">
    <div class="space"></div>
    <{include file="../Elements/guide.tpl"}>

    <div class="space"></div>


    <{if 1 < $result}>
        <{include file="../Elements/sub_title.tpl"}>

        <div class="space"></div>

        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>RaidStages/helpOffer/?kind=1&raid_master_id=<{$latest.raid_master_id}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="child" >
                    近いレベルの人
                </div>
            </a>
        </div>
        <div class="spaceHigh"></div>
        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>RaidStages/again/?stage_id=<{$stageId}>&raid_master_id=<{$latest.raid_master_id}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    再戦する
                </div>
            </a>
        </div>
        <div class="space"></div>
        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>RaidStages/<{$action}>/?stage_id=<{$stageId}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    探索を続ける
                </div>
            </a>
        </div>
    <{else}>
        <div style="position:relative;text-align:center;top:-40px;">
            <img src="<{$smarty.const.IMG_URL}>line.png">
        </div>
        <{foreach from=$pList item=data}>
            <{include file="../Elements/present.tpl"}>
            <div style="position:relative;text-align:center;top:-40px;">
                <img src="<{$smarty.const.IMG_URL}>line.png">
            </div>
        <{/foreach}>
        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>RaidStages/<{$action}>/?stage_id=<{$stageId}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    探索を続ける
                </div>
            </a>
        </div>
        <div class="space"></div>
        <div class="parent">
            <a href="<{$linkPbox}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    受取BOXへ
                </div>
            </a>
        </div>

    <{/if}>
    <div class="spaceHigh"></div>
</div>
