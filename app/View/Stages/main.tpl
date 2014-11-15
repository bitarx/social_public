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
     <img src="<{$smarty.const.IMG_URL}>quest/main_1.jpg">

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
            <div  class="btnQuestProgBoss" id="appReq" act="Stages/init" params=<{$param}>>
                <img src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestNotProgBoss" id="" act="Stages/init" params=<{$param}>>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <{/if}> 

    <{else}>
        <{if empty($notAct)}> 
            <div  class="btnQuestProg" id="appReq" act="Stages/init" params=<{$param}>>
                <img src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
                <div class="strQuestProg" >
                    進行！
                </div>
            </div>
        <{else}> 
            <div  class="btnQuestNotProg" id="" act="Stages/init" params=<{$param}>>
                <div class="strQuestProg" >
                    行動力がなくなりました‥
                </div>
            </div>
        <{/if}> 
    <{/if}> 

    <div class="progQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-<{$data.use_act}></span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+<{if 1 == $data.use_act}>1<{else}>1～<{$data.use_act}><{/if}></span>
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
        <div class="stageItemEffectBoss">
            <{if !empty($effectText)}>
                <{$effectText}>終了まであと<div id="TimeLeft" style="color:#ff0000;">></div>
            <{/if}>
        </div>
    <{else}>
        <div class="stageItemEffect">
            <{if !empty($effectText)}>
                <{$effectText}>終了まであと<div id="TimeLeft" style="color:#ff0000;">></div>
            <{/if}>
        </div>
    <{/if}>

    <div id="lotResultQuest" class="lotResultQuest">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="strLotResultDataQuest" class="strLotResultDataQuest">
    </div>


</div>
