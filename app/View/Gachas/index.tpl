<div>
    <{include file="../Elements/title.tpl"}>


    <{foreach from=$list item=data key=key}>
        <div class="gachaImg">
           <img src="<{$smarty.const.IMG_URL}>gacha/icon_<{$data.gacha_id}>.png" width="160px">
        </div>
        <div class="gachaName">
            <{$data.gacha_name}>
        </div>
        <div class="gachaDetail">
            <{$data.gacha_detail}>
        </div>
        <div class="gachaPrice">
            <{$data.point}><{$smarty.const.MONEY_NAME}>
        </div>
                <div class="btnGachaStart">
                    <a href="<{$smarty.const.BASE_URL}>Gachas/api?gacha_id=<{$data.gacha_id}>">
                    <img src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="ガチャる" name="submit">
                    <div class="strUpConf">
                       ガチャる 
                    </div>
                    </a>
                </div>
         <div class="lineGacha">
             <img src="<{$smarty.const.IMG_URL}>line.png">
        </div>
    <{/foreach}>

</div>
