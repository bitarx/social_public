<div class="helpBlock">
    <div class="helpImg">
           <img src="<{$smarty.const.IMG_URL}>enemy/enemy_s_<{$data.enemy_id}>.jpg" width="120px">
    </div>
    <div class="presentName">
            <span style="color:#ffffff"><{$data.enemy_name}>Lv<{$data.level}>
    </div>
    <div class="presentMes">
        残りHP:<span style="color:#ffffff"><{$data.hp}></span>
    </div>
    <div class="presentDate">
        逃亡時刻:<span style="color:#ffffff"><{$data.end_time}></span>
    </div>

    <div class="raidBtAgain">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/again?stage_id=<{$stageId}>&raid_master_id=<{$data.raid_master_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
            <div class="child">
                救援する
            </div>
        </a>
    </div>

</div>
