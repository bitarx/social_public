<script type="text/javascript">

$(function () {
    countDown("<{$dateStr}>");
    dispProgressQuest(<{$prog}>);
    dispProgressQuestAct(<{$act}>);
    dispProgressQuestExp(<{$exp}>);
    dispRotResultQuest();
});
</script>
<div class="stageMain">
    <div cla ss="parent">
        <img src="<{$smarty.const.IMG_URL}>raid_quest/main_<{$stageId}>.jpg">
        <div class="child">
            <{if !empty($helpWord)}>
                <div class="raidHelpWord">
                    <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
                    <div class="child">
                        <{$helpWord}>
                    </div>
                </div>
            <{/if}>
        </div>
    </div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            <{$data.stage_title}>
        </div>
    </div>

    <div class="progRaidQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-<{$data.use_act}></span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+<{if 0 == $maxExp}>0<{else}>0～<{$maxExp}><{/if}></span>
        </div>

        <{include file="../Elements/bp.tpl"}>
    </div>

    <div  class="btnRaidQuestProg" id="appReq" act="RaidStages/init<{$ownerInfo}>" params=<{$param}>>
        <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
        <div class="strQuestProg" >
            探索！
        </div>
    </div>

    <div  class="btnRaidList">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/raidList">
            <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
            <div class="strRaidList" >
               交戦中一覧へ
            </div>
        </a>
    </div>

    <div id="levelUp" class="levelUp">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="strLotResultDataQuest" class="strLotResultDataQuest">
    </div>

    <{include file="../Elements/gacha_bn.tpl"}>
</div>
