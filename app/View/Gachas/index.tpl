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
            <{if $data.gacha_id == 3}>
                <{$data.point}><{$smarty.const.MONEY_NAME}>
            <{else}> 
                <{$data.point}><{$smarty.const.POINT_NAME}>
            <{/if}> 
        </div>
                <div class="btnGachaStart">
                    <{if $data.gacha_id == 3 && 0 < $data.point && $haveMoney < $data.point }>
                        <{$smarty.const.MONEY_NAME}>が足りません
                    <{else}>
                        <a href="<{$smarty.const.BASE_URL}>Gachas/act?gacha_id=<{$data.gacha_id}>">
                        <img src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="ガチャる" name="submit">
                        <div class="strUpConf">
                           ガチャる 
                        </div>
                        </a>
                    <{/if}>
                </div>
         <div class="lineGacha">
             <img src="<{$smarty.const.IMG_URL}>line.png">
        </div>
    <{/foreach}>

</div>
