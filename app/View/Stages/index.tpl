<div class="stages index">
    <div>
        <img src="<{$smarty.const.IMG_URL}>quest/main_<{$list[0]['quest_id']}>.jpg"> 
    </div>
    <div>
        <{$list[0]['quest_detail']}> 
    </div>
    <{foreach from=$list item=val}>
        <div>
            <a href="<{$smarty.const.BASE_URL}>stages/initStage?stage_id=<{$val['stage_id']}> "><{$val['stage_id']}>. <{$val['stage_title']}> </a>
        </div>
    <{/foreach}>
</div>
