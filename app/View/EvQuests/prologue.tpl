<div class="ev_quest">
    <{include file="../Elements/title.tpl"}>
    <img src="<{$smarty.const.IMG_URL}>ev_quest/prologue_<{$event.ev_quest_id}>.jpg">
    <div class="spaceLow">
    </div>
    <div>
        <div class="space">
        </div>
        <div class="eventTextArea">
            <input type="image" src="<{$smarty.const.IMG_URL}>textarea_to.png" class="textAreaEvent">
            <div class="eventStr">
                <{$event['prologue']}> 
            </div>
        </div>
    </div>
    <div class="space">
    </div>
    <{include file="../Elements/sub_title.tpl"}>
    <div class="spaceLow">
    </div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>bord.png">
        <div class="child">
        <{foreach from=$list item=data key=key}>
          <div class="evListBlock">
            <{include file="../Elements/ev_present.tpl"}>
          </div>
        <{/foreach}>
        </div>
    </div>
    <div class="space">
    </div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>EvStages/index?ev_quest_id=<{$event.ev_quest_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
               イベントミッションへ
            </div>
        </a>
    </div>
    <div class="space">
    </div>
</div>
