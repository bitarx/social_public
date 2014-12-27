<div class="ev_quest">
    <{include file="../Elements/title.tpl"}>
    <img src="<{$smarty.const.IMG_URL}>ev_quest/prologue_<{$event.ev_quest_id}>.jpg">
    <div class="spaceLow">
    </div>
     <div class="eventTextArea">
        <input type="image" src="<{$smarty.const.IMG_URL}>textarea_to.png" class="textAreaEvent">
        <div class="eventStr">
            <{$event['epilogue']}> 
        </div>
    </div>
    <div class="space">
    </div>
    <div class="parent">
        <a href="<{$linkPbox}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
               プレゼントボックスへ
            </div>
        </a>
    </div>
    <div class="space">
    </div>
</div>
