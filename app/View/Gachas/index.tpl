<script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/jquery.bxslider.css.php" />
<script type="text/javascript">
        $(document).ready(function(){
            $('.bxslider').bxSlider({
                auto: true,
                mode: 'fade',
            });
        });
</script>
<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>   

    <div class="selectGachaKind">
      <ul class="tabs">
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=1">
            <{if 1 == $kind}> 
                <label class="labelOn"><{$smarty.const.POINT_NAME}></label>
            <{else}> 
                <label class="labelOff"><{$smarty.const.POINT_NAME}></label>
            <{/if}> 
            </a>
        </li>
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=2">
            <{if 2 == $kind}> 
                <label class="labelOn"><{$smarty.const.MONEY_NAME}></div>
            <{else}> 
                <label class="labelOff"><{$smarty.const.MONEY_NAME}></label>
            <{/if}> 
            </a>
        </li> 
      </ul>
    </div> 

    <{if 1 == $kind}>
        <div class="bx-wrapper">
            <ul class="bxslider">
              <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_ad1.jpg" title="ad1" /></li>
              <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_ad2.jpg" title="ad2" /></li>
              <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_ad3.jpg" title="ad3" /></li>
              <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_ad4.jpg" title="ad3" /></li>
            </ul>
        </div>
    <{/if}>

    <div class="gachaTextArea">
        <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="<{$textHeight}>px" width="630px">
        <div class="cardGachaText">
                カードのレアリティは最大で３段階まで進化します<br />
                レアリティは<span style="color:#FFA500">N→HN→R→HR→SR</span>の順に進化します<br />
                <{if 1 == $kind}>
                <span style="color:#FF0000">R</span>(レア)スタートで最終進化<span style="color:#EE82EE">SR</span>（エスレア）まで到達！<br />
                <span style="color:#EE82EE">SR</span>カードは<span style="color:#FFA500">ボイス付き！</span><br />
                <{/if}>
        </div>
    </div>
    <div style="position:relative;left:20px;">
         <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>

    <{foreach from=$list item=data key=key}>
        <{if $data.gacha_id == $smarty.const.GACHA_10_ID}>
            <div class="bx-wrapper">
                <ul class="bxslider">
                  <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn1.png" title="ad1" /></li>
                  <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn2.png" title="ad2" /></li>
                  <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn3.png" title="ad3" /></li>
                </ul>
            </div>
        <{elseif $data.gacha_id == $smarty.const.GACHA_SOZAI_ID}>
            <div style="position:relative;height:255px;top:-60px;text-align:center;">
                <div class="child">
                    <img src="<{$smarty.const.IMG_URL}>banner/gacha_bnst.png" width="85%">
                </div>
            </div>
        <{/if}>
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
            <{if $data.gacha_id == $smarty.const.GACHA_MONEY_ID || $data.gacha_id == $smarty.const.GACHA_MONEY_10_ID}>
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
            <{if ($data.gacha_id == $smarty.const.GACHA_MONEY_ID || $data.gacha_id == $smarty.const.GACHA_MONEY_10_ID) && 0 < $data.point && $haveMoney < $data.point }>
                <{$smarty.const.MONEY_NAME}>が足りません
            <{else}>
                <a href="<{$smarty.const.BASE_URL}>Gachas/act?gacha_id=<{$data.gacha_id}>&<{$queryString}>">
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
