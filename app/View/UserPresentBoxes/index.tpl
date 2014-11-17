<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    <div class="parent">
      <{if !empty($list)}> 
           <a href="<{$smarty.const.BASE_URL}>UserPresentBoxes/initAll">
               <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
                <div class="child">
                    一括受け取り
                </div>
           </a>
      <{else}>
          <div class="spaceHigh"></div>
          受け取れるプレゼントがありません。
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
