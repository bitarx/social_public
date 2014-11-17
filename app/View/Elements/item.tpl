<div class="card">
    <{if $ctl == 'UserItems'}>
            <div class="cardImg">
                   <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.item_id}>.png" width="160px">
            </div>
            <div class="cardName">
                <span style="color:#ffffff"><{$data.item_name}></span>
            </div>
            <div class="cardAtk">
                所持数:<span style="color:#ffffff"><{$data.num}></span>個
            </div>
            <div class="cardExp">
                効果:<span style="color:#ffffff">
                    <{$data.item_detail}>
                </span>
            </div>

        <{if !empty($data.useable)}> 
            <{if empty($effect)}>
                <div class="btnSelectCard">
                    <a href="<{$smarty.const.BASE_URL}>UserItems/<{$nextAction}>/<{$data.id}>">
                        <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                        <div class="strSelectCard">
                            使用する
                        </div>
                    </a>
                </div>
            <{else}>
                <div style="text-align:center; top:40px;">
                現在使用中のアイテムがあるため使用できません
                </div>
            <{/if}>
        <{else}>
            <div class="btnSelectCard">
            </div>
        <{/if}> 

    <{else}>
        <{if !empty($data.point)}> 
            <div class="cardImg">
                   <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.item_id}>.png" width="160px">
            </div>
            <div class="cardName">
                <span style="color:#ffffff"><{$data.item_name}></span>
            </div>
            <div class="cardAtk">
                価格:<span style="color:#ffffff"><{$data.point}></span><{$smarty.const.POINT_NAME}>
            </div>
            <div class="cardExp">
                効果:<span style="color:#ffffff">
                    <{$data.item_detail}>
                </span>
            </div>
            
            <{if $carrer == $smarty.const.CARRER_IPHONE}>
                <div class="spaceHigh"></div>
            <{else}>
                <div class="space"></div>
            <{/if}>

            <div class="btnSelectCard">
                <a href="conf/<{$data.item_id}>">
                    <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strSelectCard">
                        購入する
                    </div>
                </a>
            </div>
        <{/if}> 
    <{/if}>

</div>
