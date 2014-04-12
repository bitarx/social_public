<form method=="POST" name="sort" action="<{$smarty.const.BASE_URL}><{$ctlAction}>">    
    <div class="sort">
        <{html_options name=rare_level options=$rareLevel selected=$rareLevelSelect}>
        <{html_options name=sort_item options=$sortItem selected=$sortItemSelect}>
    </div>

    <input type="hidden" name="kind" value="<{$kind}>">

    <div class="btnSortUpdate">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" alt="更新>
確認" name="submit">
        <div class="strSortUpdate">
            更新
        </div>
    </div>
</form>
