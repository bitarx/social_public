<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
            <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
                ベースカードを変更
            </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>
        <div class="selectSynthKind">
          <ul class="tabs">
            <li>
                <a href="?kind=1">
                <{if 1 == $kind}> 
                    <label class="labelOn">強化</label>
                <{else}> 
                    <label class="labelOff">強化</label>
                <{/if}> 
                </a>
            </li>
            <li>
                <a href="?kind=2">
                <{if 2 == $kind}> 
                    <label class="labelOn">進化</div>
                <{else}> 
                    <label class="labelOff">進化</label>
                <{/if}> 
                </a>
            </li> 
          </ul>
        </div> 

    <{include file="../Elements/sort.tpl"}>

    <{if $kind == 1}> 
        <div class="space"></div>
        <form method=="POST" action="<{$smarty.const.BASE_URL}>UserCards/confUp">
            <div class="btnUpComp">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="strUpComp">
                    強化確認
                </div>
            </div>
    <{/if}>

    <{if $kind == 2 && empty($list)}> 
        <div class="paging">
            進化に使えるカードがありません。 
        </div>
    <{else}>
        <{include file="../Elements/paging.tpl"}>
        <{include file="../Elements/pagingNum.tpl"}>
    <{/if}>

    <{foreach from=$list item=data key=key}>
        <div class="listBlock">
            <{include file="../Elements/card.tpl"}>
        </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>

    <{if $kind == 1}> 
            <div class="space"></div>
            <div class="parent">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="強化確認" name="submit">
                <div class="child">
                    強化確認
                </div>
            </div>
        </form>
    <{/if}>
    
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="spaceHigh"></div>
</div>
