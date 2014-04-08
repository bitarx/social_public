<div class="bannerTitle">
    <img src="<{$smarty.const.IMG_URL}>banner_title.png">
    <{if 'UserCards' == $ctl}> 
        <div class="strTitleSynth" >
            強化進化
        </div>
    <{elseif 'UserBaseCards' == $ctl}> 
        <div class="strTitleBaseCard" >
            ベースカード変更
        </div>
    <{/if}>
</div>
