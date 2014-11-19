<div class="toppage">
    <div class="topImg">
        <img src="<{$smarty.const.IMG_URL}>tutorial/gametitle.png">
    </div>

    <{include file="../Elements/sub_title.tpl"}>

    <div class="topInfoList">
        <{foreach from=$list item=val}>
            <a href="<{$smarty.const.BASE_URL}>/Info/view/<{$val.news_id}>"><{$val.news_title}></a>
            <br /><span style="color:#FFA500">[<{$val.start_time}>]</span><br />
            <img src="<{$smarty.const.IMG_URL}>line.png"><br />
        <{/foreach}>
    </div>
    <div class="space"></div>
</div>
