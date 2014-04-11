<form method=="POST" name="sort" action="<{$smarty.const.BASE_URL}><{$ctlAction}>">    
    <div class="sort">
        <{html_options name=rareLevel options=$rareLevel selected=$rareLevelSelect}>
        <{html_options name=sortItem options=$sortItem selected=$sortItemSelect}>
    </div>

    <div class="btnSortUpdate">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" alt="更新>
確認" name="submit">
        <div class="strSortUpdate">
            更新
        </div>
    </div>
</form>
