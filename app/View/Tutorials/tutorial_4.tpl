<script type="text/javascript">

$(function () {
    dispProgressQuest(<{$prog}>);
    dispProgressQuestAct(<{$act}>);
    dispProgressQuestExp(<{$exp}>);
    dispRotResultQuest();
});
</script>
<div class="stageMain">
    <img src="<{$smarty.const.IMG_URL}>quest/main_3.jpg">

    <div  class="btnQuestProg" id="appReq" act="Tutorials/quest<{$ownerInfo}>" params=<{$param}>> 
        <input type="image" src="<{$smarty.const.BASE_URL}>img/btn_cm_l.png">
        <div class="strQuestProg" >
            進行！
        </div>
    </div>

    <div class="progQuest">
        <div class="progQuestUseStr">
            消費行動力: <span style="color:#FF1493">-1</span>&nbsp;&nbsp;獲得経験値:&nbsp;<span style="color:#1E90FF">+1</span>
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
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="strLotResultDataQuest" class="strLotResultDataQuest">
    </div>


</div>
