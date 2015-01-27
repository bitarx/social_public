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
    <img src="<{$smarty.const.IMG_URL}>raid_quest/main_<{$data.raid_quest_id}>.jpg">
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            <{$data.stage_title}>
        </div>
    </div>

    <{if !empty($boss)}> 
        <div  class="btnQuestBoss">
            <a href="conf?stage_id=<{$data.stage_id}>">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestBoss">
                    ボス出現！
                </div>
            </a>
        </div>
        <{if empty($notAct)}> 
            <div  class="btnRaidQuestProgBoss" id="appReq" act="RaidStages/init<{$ownerInfo}>" params=<{$param}>>
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestProg" >
                    探索！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestNotProgBoss" id="" act="" params=<{$param}>>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <{/if}> 

    <{else}>
        <{if empty($notAct)}> 
            <div  class="btnRaidQuestProg" id="appReq" act="RaidStages/init<{$ownerInfo}>" params=<{$param}>>
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestProg" >
                    探索！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestNotProg" id="" act="" params=<{$param}>>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <{/if}> 
    <{/if}> 

    <div class="progQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-<{$data.use_act}></span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+<{if 0 == $maxExp}>0<{else}>0～<{$maxExp}><{/if}></span>
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

    <{if !empty($boss)}> 
        <div class="stageItemEffectBoss">
            <{if !empty($effectText)}>
                <{$effectText}>終了まであと<div id="TimeLeft" style="color:#ff0000;"></div>
            <{/if}>
        </div>
    <{else}>
        <div class="stageItemEffect">
            <{if !empty($effectText)}>
                <{$effectText}>終了まであと<div id="TimeLeft" style="color:#ff0000;"></div>
            <{/if}>
        </div>
    <{/if}>

    <div id="levelUp" class="levelUp">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="strLotResultDataQuest" class="strLotResultDataQuest">
    </div>

    <div class="space"></div>
    <{if !empty($boss)}>
       <div class="spaceHigh"></div>
    <{/if}>
    <{include file="../Elements/gacha_bn.tpl"}>

</div>
