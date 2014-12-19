<div class="toppage">
    <div class="topImg">
        <img src="<{$smarty.const.IMG_URL}>sitetop.jpg">  
    </div>

    <div class="space"></div>
    <div class="parent">
        <a href="<{$linkQuest}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_start.jpg">
        </a>
    </div>
    <div class="space"></div>

    <{include file="../Elements/sub_title.tpl"}>

    <div class="space"></div>
    <div class="topInfoList">
        <{foreach from=$list item=val}>
            <a href="<{$smarty.const.BASE_URL}>/Info/view/<{$val.news_id}>"><{$val.news_title}></a>
            <br /><span style="color:#FFA500">[<{$val.start_time}>]</span><br />
            <img src="<{$smarty.const.IMG_URL}>line.png"><br />
        <{/foreach}>
    </div>
    <div class="space"></div>
</div>
