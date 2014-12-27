<div class="commonDisplayFree">
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/card.tpl"}>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
                ベースカードを変更
            </div>
        </a>
    </div>

    <{include file="../Elements/line.tpl"}>
        <div class="selectSynthKind">
          <ul class="tabs">
            <li>
                <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=1">
                <{if 1 == $kind}> 
                    <label class="labelOn">強化</label>
                <{else}> 
                    <label class="labelOff">強化</label>
                <{/if}> 
                </a>
            </li>
            <li>
                <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=2">
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
        <form method="post" action="<{$smarty.const.BASE_URL_PRE}>UserCards/confUp">
            <div class="parent">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_synth_conf.png" alt="強化確認" name="submit">
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

    <div class="space"></div>

    <{foreach from=$list item=data key=key}>
        <div class="listBlock">
            <{include file="../Elements/card.tpl"}>
        </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>

    <{if $kind == 1}> 
            <div class="spaceHigh"></div>
            <div class="parent">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_synth_conf.png" alt="強化確認" name="submit">
            </div>
            <div class="space"></div>
        </form>
    <{/if}>
    
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="spaceHigh"></div>
</div>
