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
    <img src="<{$smarty.const.IMG_URL}>quest/main_<{$data.quest_id}>.jpg">
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            <{$data.stage_title}>
        </div>
    </div>

    <{if !empty($boss)}> 
        <{if empty($notAct)}> 
            <div  class="btnQuestBoss">
                <a href="<{$smarty.const.BASE_URL}>Stages/conf?stage_id=<{$data.stage_id}>">
                    <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                    <div class="strQuestBoss">
                        ボス出現！
                    </div>
                </a>
            </div>
            <div  class="btnQuestProgBoss" id="appReq" act="Stages/init<{$ownerInfo}>" params=<{$param}>>
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestBossNotProg">
                <a href="<{$smarty.const.BASE_URL}>Stages/conf?stage_id=<{$data.stage_id}>">
                    <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                    <div class="strQuestBoss">
                        ボス出現！
                    </div>
                </a>
            </div>
            <div  class="btnQuestNotProgBoss">
                行動力がなくなりました‥
                <a href="<{$linkRaid}>">
                    <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                    <div class="strQuestNotProgBoss" >
                            行動力不要のレイドボスバトルへ
                    </div>
                </a>
            </div>
            <div class="space"></div>
        <{/if}> 

    <{else}>
        <{if empty($notAct)}> 
            <div  class="btnQuestProg" id="appReq" act="Stages/init<{$ownerInfo}>" params=<{$param}>>
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestNotProg">
                行動力がなくなりました‥
                <a href="<{$linkRaid}>">
                    <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                    <div class="strQuestNotProg" >
                            行動力不要のレイドボスバトルへ
                    </div>
                </a>
            </div>
            <div class="space"></div>
        <{/if}> 
    <{/if}> 

    <div class="progQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-<{$data.use_act}></span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+<{if 0 == $maxExp}>0<{else}>0～<{$maxExp}><{/if}></span>
        </div>
        <div class="progQuestMainStr">
            進行度:
        </div>
        <div id="progQuestMain" class="progQuestMain">
        </div>
        <div class="progQuestActStr">
            行動力:
        </div>
        <div id="progQuestAct" class="progQuestAct">
        </div>
        <div class="progQuestExpStr">
            経験値:
        </div>
        <div id="progQuestExp" class="progQuestExp">
        </div>
    </div>

    <{if !empty($boss)}> 
        <div  class="btnQuestToStageListBoss">
            <a href="<{$linkStage}>?quest_id=<{$data.quest_id}>">
                <input type="image"  src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    ステージ一覧へ
                </div>
            </a>
        </div>
        <div class="stageItemEffectBoss">
            <{if !empty($effectText)}>
                <{$effectText}>終了まであと<div id="TimeLeft" style="color:#ff0000;"></div>
            <{/if}>
        </div>
    <{else}>
        <div  class="btnQuestToStageList">
            <a href="<{$linkStage}>?quest_id=<{$data.quest_id}>">
                <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="child" >
                    ステージ一覧へ
                </div>
            </a>
        </div>
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
