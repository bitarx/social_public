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
    <div  class="btnQuestProg" id="appReq" act="Stages/init" params=<{$param}>>
        <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
        <div class="strQuestProg" >
            進行！
        </div>
    </div>

    <div class="progQuest">
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
