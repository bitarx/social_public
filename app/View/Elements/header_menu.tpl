<div class="header">
    <img src="<{$smarty.const.BASE_URL}>img/header_base.png" class="headerBar">
<{if $tutoEnd == 1}>  
    <div class="btn_my">
        <a href="<{$linkUser}>"><input type="image" src="<{$smarty.const.BASE_URL}>img/btn_my_on.png"></a>
    </div>
    <div class="btn_synth">
        <a href="<{$linkUserCard}>"><input type="image" src="<{$smarty.const.BASE_URL}>img/btn_synth_on.png"></a>
    </div>
    <div class="btn_quest">
        <a href="<{$linkQuest}>"><input type="image" src="<{$smarty.const.BASE_URL}>img/btn_quest_on.png"></a>
    </div>        
    <div class="btn_gacha">
        <a href="<{$linkGacha}>"><input type="image" src="<{$smarty.const.BASE_URL}>img/btn_gacha_on.png"></a>
    </div>
    <div class="btn_menu">
        <a rel="leanModal" href="#div_menu"><input type="image" src="<{$smarty.const.BASE_URL}>img/btn_menu_on.png"></a>
    </div>
<{else}> 

    <div class="btn_my_off">
       <img src="<{$smarty.const.BASE_URL}>img/btn_my_off.png">
    </div>
    <div class="btn_synth_off">
        <img src="<{$smarty.const.BASE_URL}>img/btn_synth_off.png">
    </div>
    <div class="btn_quest_off">
        <img src="<{$smarty.const.BASE_URL}>img/btn_quest_off.png">
    </div>        
    <div class="btn_gacha_off">
        <img src="<{$smarty.const.BASE_URL}>img/btn_gacha_off.png">
    </div>
    <div class="btn_menu_off">
        <img src="<{$smarty.const.BASE_URL}>img/btn_menu_off.png">
    </div>
<{/if}> 
</div>
