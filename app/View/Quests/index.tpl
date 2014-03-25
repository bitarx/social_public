<div class="quests index">
	<h2>Quests</h2>
    <{foreach from=$list item=val}> 
        <div>
            <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "><{$val['quest_id']}>. <{$val['quest_title']}> <br /><{$val['detail_before1']}> </a>
        </div>
    <{/foreach}> 
</div>
