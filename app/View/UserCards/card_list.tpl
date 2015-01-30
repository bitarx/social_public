<div class="commonDisplayFree">
    <{include file="../Elements/title.tpl"}>

    <{include file="../Elements/sort.tpl"}>

    <{include file="../Elements/paging.tpl"}>
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="space"></div>

    <{foreach from=$list item=data key=key}>
        <div class="listBlock">
            <{include file="../Elements/card.tpl"}>
        </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>

    
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="spaceHigh"></div>
</div>
