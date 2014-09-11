<div class="userBaseCards index">
    <{include file="../Elements/title.tpl"}>
        <{include file="../Elements/paging.tpl"}>
    <div style="height:20px;">
    </div>
    <{foreach from=$list item=data key=key}>
        <{include file="../Elements/card.tpl"}>
        <div style="height:50px;">
            <{include file="../Elements/line.tpl"}>
        </div>
    <{/foreach}>
    <{include file="../Elements/paging.tpl"}>
</div>
