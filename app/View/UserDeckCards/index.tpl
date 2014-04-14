<div>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
        <div class="strChangeBase" >
           デッキ自動編成 
        </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/card.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
</div>
