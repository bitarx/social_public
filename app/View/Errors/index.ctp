<div class="errors index">
    <{include file="../Elements/guide.tpl"}>
    <{if 1 != $guideId}>
        <br />
        <div class="btnGacha">
            <a href="<{$linkUser}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" name="submit">
            <div class="strGacha">
                マイページ
            </div>
            </a>
        </div>
    <{/if}>
</div>
