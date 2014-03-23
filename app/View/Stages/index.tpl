<div class="stages index">
	<h2>Stages</h2>
    <{foreach from=$list item=val}>
        <a href="initStage?stage_id=<{$val['stage_id']}> "><{$val['stage_id']}>. <{$val['stage_title']}> </a>
    <{/foreach}>
</div>
