<div class="stages index">
    <div>
        <img src="<{$smarty.const.IMG_URL}>quest/prologue_<{$list[0]['quest_id']}>.jpg"> 
    </div>
    <div>
        <{$list[0]['quest_detail']}> 
    </div>
    <{foreach from=$list item=val}>
        <div>
            <a href="initStage?stage_id=<{$val['stage_id']}> "><{$val['stage_id']}>. <{$val['stage_title']}> </a>
        </div>
    <{/foreach}>
</div>
