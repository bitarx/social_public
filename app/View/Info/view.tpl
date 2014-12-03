<div class="mypage">

    <div class="parent">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  height="64px" width="680px">
        <div class="child">
            <{$data.news_title}>&nbsp;<span style="color:#FFA500">[<{$data.start_time}>]</span>
        </div>
    </div>
    <div>
       <{$data.news_detail}>
    </div>
    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$linkSnsUser}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
               トップページ
            </div>
        </a>
    </div>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$linkUser}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
               マイページ
            </div>
        </a>
    </div>
</div>
