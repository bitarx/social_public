<div class="presentBlock">
    <div class="presentImg">
       <{if $smarty.const.KIND_CARD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.target}>.jpg" width="120px">
       <{elseif $smarty.const.KIND_ITEM == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.target}>.png" width="120px">
       <{elseif $smarty.const.KIND_GOLD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/gold.png" width="120px">

       <{/if}>
    </div>
    <div class="presentName">
            <span style="color:#ffffff"><{$data.enemy_name}>Lv<{$data.level}>
    </div>
    <div class="presentMes">
        残りHP:<span style="color:#ffffff"><{$data.hp}></span>
    </div>
    <div class="presentDate">
        交戦日時:<span style="color:#ffffff"><{$data.created}></span>
    </div>

    <div class="raidBtAgain">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/again?stage_id=<{$stageId}>&raid_master_id=<{$data.raid_master_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
            <div class="child">
                再戦する
            </div>
        </a>
    </div>

</div>
