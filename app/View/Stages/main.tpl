<script type="text/javascript">


$(function () {
    dispProgressQuest(<{$prog}>);
    dispProgressQuestAct(<{$act}>);
    dispProgressQuestExp(<{$exp}>);
    dispRotResultQuest();
});
</script>
<div class="stagesMain">
    <div>
       <{$data['Quest']['detail_before2']}> 
    </div>

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

    <{if !empty($boss)}> 
        <a href="conf?stage_id=<{$data.stage_id}>">
            <div  class="btnQuestBoss">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestBoss">
                    ボス出現！
                </div>
            </div>
        </a>
    <{/if}> 

    <div class="progQuest">
        <div class="progQuestUseStr">
            行動力: 経験値
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

    <div id="lotResultQuest" class="lotResultQuest">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>


</div>
