<div class="present">
    <div class="presentImg">
       <{if $smarty.const.KIND_CARD == $data.kind }>
           <img src="<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$data.target}>" width="100px">
       <{elseif $smarty.const.KIND_ITEM == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.target}>.png" width="100px">
       <{elseif $smarty.const.KIND_GOLD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/gold.png" width="100px">

       <{/if}>
    </div>
    <div class="presentName">
            <span style="color:#ffffff"><{$data.name}>
    </div>
    <div class="presentMes">
        <span style="color:#ffffff"><{$data.message}></span>
    </div>
    <div class="presentDate">
        入手日時:<span style="color:#ffffff"><{$data.created}></span>
    </div>

    <{if $ctl == 'UserPresentBoxes'}>

        <a href="<{$smarty.const.BASE_URL}>UserPresentBoxes/init?user_present_box_id=<{$data.user_present_box_id}><{$addParam}>">
            <div class="btnSelectPresent">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectPresent">
                   受け取る 
                </div>
            </div>
        </a>
    <{/if}>

</div>
