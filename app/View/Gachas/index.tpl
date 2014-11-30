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
            <{if $data.gacha_id == $smarty.const.GACHA_MONEY_ID}>
                <{$data.point}><{$smarty.const.MONEY_NAME}><br />
                所持<{$smarty.const.MONEY_NAME}>：<{$haveMoney}>
            <{else}> 
                <{if $data.gacha_id == $smarty.const.GACHA_PREMIUM_ID && 0 < $tNum}>
                    ガチャチケット<{$tNum}>枚所有
                <{else}>
                    <{$data.point}><{$smarty.const.POINT_NAME}>
                <{/if}>
            <{/if}> 
        </div>

        <div class="parent">
            <{if $data.gacha_id == 3 && 0 < $data.point && $haveMoney < $data.point }>
                <{$smarty.const.MONEY_NAME}>が足りません
            <{else}>
                <a href="<{$smarty.const.BASE_URL}>Gachas/act?gacha_id=<{$data.gacha_id}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="ガチャる" name="submit">
                <{if $data.gacha_id == $smarty.const.GACHA_PREMIUM_ID && 0 < $tNum}>
                    <div class="child">
                       チケットでガチャる 
                    </div>
                <{else}>
                    <div class="child">
                       ガチャる 
                    </div>
                <{/if}>
                </a>
            <{/if}>
        </div>

        <div class="space"></div>

        <div class="lineGacha">
             <img src="<{$smarty.const.IMG_URL}>line.png">
        </div>
    <{/foreach}>

</div>
