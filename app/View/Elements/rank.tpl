<div class="helpBlock">
    <div class="helpImg">
         <{if !empty($data.card_id)}>
             <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.card_id}>.jpg" width="120px">
         <{else}>
             <img src="<{$smarty.const.IMG_URL}>noimg.png" width="120px">
         <{/if}>
    </div>
    <div class="presentName">
        <{if empty($data.rankStr)}><{$data.rank}>位<{else}><{$data.rankStr}><{/if}>:<a href="<{$smarty.const.BASE_URL}>Users/prof/<{$data.user_id}>"><span style="color:#ffffff"><{$data.user_name}></span></a>
    </div>
    <div class="presentMes">
        Pt:<span style="color:#ffffff"><{$data.point}></span>
    </div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>Users/prof/<{$data.user_id}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png">
            <div class="child">
                <span style="color:#ffffff">プロフィール</span>
            </div>
        </a>
    </div>

</div>
