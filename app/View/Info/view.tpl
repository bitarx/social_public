<div class="mypage">
    <{include file="../Elements/sub_title.tpl"}>

    <div class="view">
       <{$data.news_detail}>
    </div>
    <div class="spaceHigh"></div>
    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>Info/index">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child" >
               お知らせ一覧へ
            </div>
        </a>
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
    <div class="space"></div>
</div>
