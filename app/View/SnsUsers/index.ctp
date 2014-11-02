<div class="snsUsers index">

    <img src="<{$smarty.const.IMG_URL}>tutorial/gametitle.png">

    <div class="topInfo">
        <div class="topLineUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div class="topLineStr" >
            お知らせ
        </div>
        <div class="topLineUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>
    <div class="topInfoList">
        <{foreach from=$list item=val}>
            <a href="<{$smarty.const.BASE_URL}>/Info/view/<{$val.news_id}>"><{$val.news_title}></a>
            <br /><span style="color:#FFA500">[<{$val.start_time}>]</span><br />
            <img src="<{$smarty.const.IMG_URL}>line.png">
        <{/foreach}>
    </div>
</div>
