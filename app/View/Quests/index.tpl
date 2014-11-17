<div class="quest">
    <img src="<{$smarty.const.IMG_URL}>quest/start.jpg">
    <div class="spaceLow">
    </div>
    <{foreach from=$list item=val}> 
        <div>
            <div class="space">
            </div>
            <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "><{$val['quest_id']}>. <{$val['quest_title']}>
                <div class="spaceLow">
                </div>
                <div class="quest">
                    <img src="<{$smarty.const.IMG_URL}>textarea.png" class="textAreaStageImg">
                    <div class="strQuestList">
                        <{$val['detail_before1']}> 
                    </div>
                </div>
            </a>
        </div>
        <div class="spaceLow">
        </div>
    <{/foreach}> 
    <div class="space">
    </div>
</div>
