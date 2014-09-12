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
            <a href="<{$smarty.const.BASE_URL}>UserItems/<{$nextAction}>/<{$data.id}>">
                <div class="btnSelectCard">
                    <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strSelectCard">
                        使用する
                    </div>
                </div>
            </a>
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

            <a href="conf/<{$data.item_id}>">
                <div class="btnSelectCard">
                    <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strSelectCard">
                        購入する
                    </div>
                </div>
            </a>
        <{/if}> 
    <{/if}>

</div>
