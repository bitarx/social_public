<form method="post" name="sort" action="<{$smarty.const.BASE_URL}><{$ctlAction}>">    
    <div class="sort">
        <{html_options name=rare_level options=$rareLevel selected=$rareLevelSelect}>
        <{html_options name=sort_item options=$sortItem selected=$sortItemSelect}>
    </div>

    <input type="hidden" name="kind" value="<{$kind}>">

    <{if $ctl == 'UserDeckCards'}> 
        <input type="hidden" name="user_deck_id" value="<{$user_deck_id}>">
        <input type="hidden" name="deck_number" value="<{$deck_number}>">
    <{/if}> 

    <div class="btnSortUpdate">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_update.png" alt="更新
確認" name="submit">
    </div>
</form>
