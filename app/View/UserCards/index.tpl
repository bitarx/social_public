<div>
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
        <div class="strChangeBase" >
            ベースカードを変更
        </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>
        <div id="" class="selectSynthKind">
            <a href="?kind=1">強化</a> 
            <a href="?kind=2">進化</a> 
        </div> 

    <{include file="../Elements/sort.tpl"}>
    
    <{if $kind == 1}> 
        <form method=="POST" action="<{$smarty.const.BASE_URL}>UserCards/confUp">
            <div class="btnUpConf">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpConf">
                    強化確認
                </div>
            </div>
    <{/if}>

    <{include file="../Elements/paging.tpl"}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/card.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
    <{if $kind == 1}> 
            <div class="btnUpConf">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpConf">
                    強化確認
                </div>
            </div>
        </form>
    <{/if}>
    
        <{include file="../Elements/pagingNum.tpl"}>
</div>
