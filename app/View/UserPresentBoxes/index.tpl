<div class="userPresentBoxesIndex">
    <{include file="../Elements/title.tpl"}>

    <div class="btnGetPresentAll">
      <{if !empty($list)}> 
       <a href="<{$smarty.const.BASE_URL}>UserPresentBoxes/initAll">
       <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
        <div class="strGetPresentAll">
            一括受け取り
        </div>
        </a>
      <{else}>
        受け取れるプレゼントがありません。
      <{/if}>
    </div>

    <{include file="../Elements/paging.tpl"}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/present.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>

    <{include file="../Elements/paging.tpl"}>
</div>
