<div class="quests index">
    <img src="<{$smarty.const.IMG_URL}>quest/start.jpg">
    <{foreach from=$list item=val}> 
        <div>
            <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "><{$val['quest_id']}>. <{$val['quest_title']}> <br /><{$val['detail_before1']}> </a>
        </div>
    <{/foreach}> 
</div>
