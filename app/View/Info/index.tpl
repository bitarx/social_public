<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>
    <{include file="../Elements/paging.tpl"}>
    <div class="space"></div>
    <div class="topInfoList">
        <{foreach from=$list item=val}>
            <a href="<{$smarty.const.BASE_URL}>/Info/view/<{$val.news_id}>"><{$val.news_title}></a>
            <br /><span style="color:#FFA500">[<{$val.start_time}>]</span><br />
            <img src="<{$smarty.const.IMG_URL}>line.png"><br />
        <{/foreach}>
    </div>
    <{include file="../Elements/paging.tpl"}>
</div>
