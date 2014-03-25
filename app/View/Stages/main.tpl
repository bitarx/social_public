<script type="text/javascript">
$(function () {
    dispProgressQuest(<{$prog}>);
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
    <div id="appReq" act="Stages/init" params=<{$param}>>
        進行！
    </div>
    <div id="progQuest" class="progQuest">
    </div>
    <div id="progQuestAct">
    </div>
</div>
