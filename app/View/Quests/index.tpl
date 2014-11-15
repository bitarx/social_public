<div class="quest">
    <img src="<{$smarty.const.IMG_URL}>quest/start.jpg">
    <div class="space">
    </div>
    <{foreach from=$list item=val}> 
        <div>
            <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "><{$val['quest_id']}>. <{$val['quest_title']}> 
            <div style="height:5px;">
            </div>
            <{$val['detail_before1']}> </a>
        </div>
        <div style="height:15px;">
        </div>
    <{/foreach}> 
</div>
