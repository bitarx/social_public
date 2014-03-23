<div class="quests index">
	<h2>Quests</h2>
    <{foreach from=$list item=val}> 
        <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "><{$val['quest_id']}>. <{$val['quest_title']}> </a>
    <{/foreach}> 
</div>
