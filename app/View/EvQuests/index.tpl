<div class="commonDisplay">
    <img src="<{$smarty.const.IMG_URL}>ev_quest/main_<{$event.ev_quest_id}>.jpg">
    <div class="spaceLow">
    </div>
    <div>
        <div class="space">
        </div>
        <{$event['quest_title']}>
            <div class="spaceLow">
            </div>
             <a href="<{$smarty.const.BASE_URL}>EvStages/index?ev_quest_id=<{$event['ev_quest_id']}>"> 
             <div class="questText">
                <input type="image" src="<{$smarty.const.IMG_URL}>textarea.png" class="textAreaStageImg">
                <div class="strQuestList">
                    <{$event['quest_detail']}> 
                </div>
            </div>
            </a>
    </div>
    <div class="spaceLow">
    </div>
    <div class="space">
    </div>
</div>
