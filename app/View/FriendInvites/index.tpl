<div class="ev_quest">
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/guide.tpl"}>

    <{include file="../Elements/sub_title.tpl"}>
    <div class="spaceLow">
    </div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="textareaGd">
        <div class="child">
            <{$smarty.const.SNS_FRIEND_NAME}>に招待メールを送ると１人当たりプレゼント
        </div>
    </div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>bord.png" height="240px" width="640px">
        <div class="child">
        <div class="space"></div>
        <{foreach from=$list item=data key=key}>
          <div class="evListBlock">
            <{include file="../Elements/ev_present.tpl"}>
          </div>
        <{/foreach}>
        </div>
    </div>
    <div class="spaceLow"></div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="textareaGd">
        <div class="child">
            チュートリアルクリアで招待した人された人にプレゼント
        </div>
    </div>
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>bord.png" height="240px" width="640px">
        <div class="child">
        <div class="space"></div>
        <{foreach from=$listP2 item=data key=key}>
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
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="招待" name="submit">
        <div class="child">
            <{$smarty.const.SNS_FRIEND_NAME}>を招待            
        </div>
      </form>
    </div>
    <div class="space">
    </div>
</div>