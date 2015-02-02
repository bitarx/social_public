<div class="commonDisplayFree">
    <{include file="../Elements/title.tpl"}>
    <div class="collectHead">
       <a href="<{$smarty.const.BASE_URL}>Users/prof/<{$userId}>" style="text-decoration:none;"><span style="color:#1E90FF">⇒プロフィールへ<span></a>
    </div>

    <{include file="../Elements/paging.tpl"}>
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="space"></div>

    <{foreach from=$list item=data key=key}>
        <div class="listBlock">
            <{include file="../Elements/card_collect.tpl"}>
        </div>
        <div class="space"></div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
    
    <{include file="../Elements/paging.tpl"}>
    <{include file="../Elements/pagingNum.tpl"}>

    <div class="spaceHigh"></div>
</div>
