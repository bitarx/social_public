<script type="text/javascript">
$(function () {
    dispProgressQuestExp(<{$data.exp}>);
});
</script> 
<div class="userCards index">
    <div class="bannerTitle">
        <img src="<{$smarty.const.IMG_URL}>banner_title.png">
        <div class="strTitle" >
            強化進化
        </div>
    </div>
    <{include file="../Elements/card.tpl"}>
    <div class="changeBase">
        <img src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
        <a href="<{$smarty.const.BASE_URL}>UserBaseCards/index">
        <div class="strChangeBase" >
            ベースカードを変更
        </div>
        </a>
    </div>
</div>
