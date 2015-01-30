<div class="status">
    <div class="parent">
        <img src="<{$smarty.const.IMG_URL}>textarea_gd.png" class="subjectImg">
        <div class="child">
            <{$name}> 
        </div>
    </div>
    <div class="myLevel">
        レベル:&nbsp;<span style="color:#ffffff"><{$data.level}></span>
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
        dispProgressQuestActMy(<{$act}>);
    </script>

    <div class="cardCnt">
        図鑑：<span style="color:#00FF00"><{$haveCnt}></span> <span style="color:#ffffff">/ <{$allCnt}></span>  <a href="<{$linkCollect}>?user_id=<{$id}>" style="text-decoration:none;"><span style="color:#1E90FF">⇒図鑑を見る</span></a>
    </div>
    <div class="myMoney">
        所持<{$smarty.const.MONEY_NAME}>：&nbsp;<span style="color:#ffffff"><{$haveMoney}></span>
    </div>
    <div class="myBp">
        攻撃力:<span style="color:#ffffff"><{$atk}></span>   防御力:<span style="color:#ffffff"><{$def}></span>   HP:<span style="color:#ffffff"><{$hp}></span>
    </div>
    <{if $smarty.const.PLATFORM_ENV == 'waku'}>
        <div class="emojiComment">
            ※当ゲームでは絵文字は非対応となっております。
        </div>
    <{/if}>
</div>
