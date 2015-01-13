<script type="text/javascript">
  window.addEventListener("load", function(e) {
    var btn = document.getElementById("startInvite");
    btn.addEventListener("click", function(evt) {
        nijiyome.ui(
          {
            'method': 'invite',
            'body': '<{$body}>',
            'allow_switch': 0,
            'callback_url':'<{$callbackUrl}>', 
            'overwrite':true
          }
        );
    });
  });
</script>
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
    <div class="spaceHigh">
    <div class="space"></div>
    </div>
    <{if $smarty.const.PLATFORM_ENV == 'niji'}>
        <div id="startInvite" class="parent">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="招待" name="submit">
            <div class="child">
                <{$smarty.const.SNS_FRIEND_NAME}>を招待            
            </div>
        </div>
    <{else}>
        <div class="parent">
          <form action="<{$action}>" method="post">
            <input type="hidden" name="body" value="<{$body}>" />
            <{if $smarty.const.PLATFORM_ENV == 'waku'}>
                <input type="hidden" name="subject" value="<{$subject}>" />
                <input type="hidden" name="url" value="<{$callbackUrl}>" />
            <{else}>
                <input type="hidden" name="callbackUrl" value="<{$callbackUrl}>" />
            <{/if}>
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png" alt="招待" name="submit">
            <div class="child">
                <{$smarty.const.SNS_FRIEND_NAME}>を招待            
            </div>
          </form>
        </div>
    <{/if}>
    <div class="space">
    </div>
</div>
