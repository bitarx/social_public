<div>
    <{include file="../Elements/title.tpl"}>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_st_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserDeckCards/sortAtk">
        <div class="strChangeBase" >
           攻撃強い順で編成 
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
    <div class="userCardListUnder">
    </div>
</div>
