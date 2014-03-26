<script type="text/javascript">
$(function () {
    dispProgressQuest(<{$prog}>);
    dispProgressQuestAct(<{$act}>);
    dispProgressQuestExp(<{$exp}>);
});
</script>
<div class="stages index">
	<h2>Stages main</h2>
    <div>
       <{$data['Quest']['detail_before2']}> 
    </div>
    <{$param}>
    <div id="lotResultQuest" class="lotResultQuest">
    </div>
    <div id="lotResultDataQuest" class="lotResultDataQuest">
    </div>
    <div id="appReq" act="Stages/init" params=<{$param}>>
        進行！
    </div>
        進捗率:
    <div id="progQuest" class="progQuest">
    </div>
        行動力:
    <div id="progQuestAct" class="progQuest">
    </div>
        経験値:
    <div id="progQuestExp" class="progQuest">
    </div>
</div>
