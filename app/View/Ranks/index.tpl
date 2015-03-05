<div class="stages">
    <{include file="../Elements/title.tpl"}>   

    <div class="raidBtList">
        <{if !empty($list)}>
            <{include file="../Elements/paging.tpl"}>
            <div class="space"></div>
            <{foreach from=$list item=data}>
                <{include file="../Elements/help.tpl"}>
                <div class="spaceHigh"></div>
            <{/foreach}>
            <{include file="../Elements/paging.tpl"}>
        <{else}>
            <div class="spaceHigh"></div>
            <{include file="../Elements/guide.tpl"}>   
        <{/if}>
        <div class="space"></div>
        <div class="parent">
            <a href="<{$linkRaid}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child">
                レイドボスへ
            </div>
            </a>
        </div>
        <div class="spaceHigh"></div>
    </div>
</div>
