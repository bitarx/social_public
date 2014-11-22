<div>
    <{include file="../Elements/title.tpl"}>
    <div class="center">
        <span style="color:#FFA500">デッキコスト</span> <{$cost}> / <{$costAtk}>
    </div>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserDeckCards/sortAtk">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
            <div class="child" >
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
