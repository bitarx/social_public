<div class="status">
    <div class="subTitle">
       <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" height="32px" width="680px">
        <div class="subTitleStr">
            <{$name}> 
        </div>
    </div>
    <div class="myLevel">
        レベル:<span style="color:#ffffff"><{$data.level}></span>
    </div>
    <div class="myAct">
        行動力:
    </div>
    <div id="progQuestAct" class="progMyAct">
    </div>
    <div class="myActInt">
        <span style="color:#ffffff"><{$data.act}> / <{$data.act_max}></span>
    </div>

    <script type="text/javascript">
        dispProgressQuestAct(<{$data.act}>);
    </script>

    <div class="cardCnt">
        カード：<span style="color:#ffffff"><{$data.card_cnt}> / <{$smarty.const.CARD_MAX_NUM }></span>
    </div>


</div>
