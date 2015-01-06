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
            <span style="color:#ffffff"><{$data.name}><{if $smarty.const.KIND_ITEM == $data.kind}>×<{$data.num}><{/if}>
    </div>
    <div class="presentMes">
        <span style="color:#ffffff"><{$data.message}></span>
    </div>
    <div class="presentDate">
        入手日時:<span style="color:#ffffff"><{$data.created}></span>
    </div>

    <{if $ctl == 'UserPresentBoxes'}>

        <div class="parent">
            <a href="<{$smarty.const.BASE_URL}>UserPresentBoxes/init?user_present_box_id=<{$data.user_present_box_id}><{$addParam}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="child">
                   受け取る 
                </div>
            </a>
        </div>
    <{/if}>

</div>
