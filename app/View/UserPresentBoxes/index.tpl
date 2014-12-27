<div class="present">
    <{include file="../Elements/title.tpl"}>

    <div class="space"></div>
    <{if !empty($hasMaxFlg)}>
        <div style="text-align:center">
            <span style="color:#FFA500">
                カード所持数が上限に達しています。
            </span>
        </div>
    <{/if}>
    <div class="space"></div>
    <div class="parent">
      <{if !empty($list)}> 
           <a href="<{$smarty.const.BASE_URL}>UserPresentBoxes/initAll">
               <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
                <div class="child">
                    一括受け取り
                </div>
           </a>
      <{else}>
          <div class="spaceHigh"></div>
          受け取れるプレゼントがありません。
          <div class="spaceHigh"></div>
      <{/if}>
    </div>

    <{if !empty($list)}> 
        <{include file="../Elements/paging.tpl"}>

        <{foreach from=$list item=data key=key}>
          <div class="listBlock">
            <{include file="../Elements/present.tpl"}>
          </div>
            <{include file="../Elements/line.tpl"}>
        <{/foreach}>

        <{include file="../Elements/paging.tpl"}>
    <{/if}>

    <div class="spaceHigh"></div>
</div>
