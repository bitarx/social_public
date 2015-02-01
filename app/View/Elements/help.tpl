<div class="helpBlock">
    <div class="helpImg">
         <{if !empty($data.card_id)}>
             <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.card_id}>.jpg" width="120px">
         <{else}>
             <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.target}>.jpg" width="120px">
         <{/if}>
    </div>
    <div class="presentName">
        救援要請者:<a href="<{$smarty.const.BASE_URL}>Users/prof/<{$data.user_id}>"><span style="color:#ffffff"><{$data.user_name}></span></a>
    </div>
    <div class="presentMes">
        レイドボス:<span style="color:#ffffff"><{$data.card_name}>Lv<{$data.level}></span>
    </div>
    <div class="presentDate">
        逃亡時刻:<span style="color:#ffffff"><{$data.end_time}></span>
    </div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/conf/?raid_master_id=<{$data.raid_master_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png">
            <div class="child">
                <span style="color:#ffffff">参戦する</span>
            </div>
        </a>
    </div>

</div>
