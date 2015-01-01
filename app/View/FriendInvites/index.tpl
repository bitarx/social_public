<div class="ev_quest">
    <{include file="../Elements/title.tpl"}>
    <img src="<{$smarty.const.IMG_URL}>ev_quest/prologue_<{$event.ev_quest_id}>.jpg">
    <div class="spaceLow">
    </div>
    <div>
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
      <form action="<{$action}>" method="post">
        <input type="hidden" name="body" value="<{$body}>" />
        <input type="hidden" name="callbackUrl" value="<{$callbackUrl}>" />
        <input type="submit" value="<{$smarty.const.SNS_FRIEND_NAME}>を招待" />
      </form>
    </div>
    <div class="space">
    </div>
</div>
