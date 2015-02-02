<div class="helpBlock">
    <div class="helpImg">
        <{if !empty($data.card_id)}>
           <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.card_id}>.jpg" width="120px">
        <{else}>
           <img src="<{$smarty.const.IMG_URL}>noimg.png" width="120px">
        <{/if}>
    </div>
    <div class="presentName">
            <a href="<{$smarty.const.BASE_URL}>Users/prof/<{$data.user_id}>"><span style="color:#ffffff"><{$data.user_name}></span></a>
    </div>
    <div class="helpSelfMes">
        レイドボス:<span style="color:#ffffff"><{$data.enemy_name}>Lv<{$data.level}></span>
    </div>
    <div class="helpSelfDamage">
        与えたダメージ:<span style="color:#ffffff"><{$data.damage}></span>
    </div>
    <div class="helpSelfDate">
        救援時刻:<span style="color:#ffffff"><{$data.created}></span>
    </div>

</div>
