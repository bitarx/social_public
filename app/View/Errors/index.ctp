<div class="errors index">
    <{if !$guideId}>
        <br />
        <div style="text-align:center;top:30px;height:100px;">
            <{$mes}>
        </div>
        <div class="btnGacha">
            <a href="<{$linkUser}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="強化進化へ" name="submit">
            <div class="strGacha">
                マイページ
            </div>
            </a>
        </div>
    <{else}>
        <{include file="../Elements/guide.tpl"}>

        <div class="btnGacha">
            <a href="<{$linkUserCard}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="強化進化へ" name="submit">
            <div class="strGacha">
                強化進化へ
            </div>
            </a>
        </div>
    <{/if}>
</div>
