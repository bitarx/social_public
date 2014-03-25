<div class="stages index">
	<h2>Stages</h2>
    <div>
        <{$list[0]['quest_detail']}> 
    </div>
    <{foreach from=$list item=val}>
        <div>
            <a href="initStage?stage_id=<{$val['stage_id']}> "><{$val['stage_id']}>. <{$val['stage_title']}> </a>
        </div>
    <{/foreach}>
</div>
