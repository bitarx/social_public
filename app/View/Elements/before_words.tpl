<div class="enemy">

    <div class="enemyFukidashi">
        <div class="enemyFukiMiddle">
           <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="600px" height="100px">
        </div>
        <div class="enemyFukiUpper">
           <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="600px">
        </div>
        <{if $smarty.const.CARRER_IPHONE == $carrer}>
            <div class="enemyFukiUp">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_right.png" width="20px">
            </div>
        <{else}>
            <div class="enemyFukiUpAndroid">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_right.png" width="20px">
            </div>
        <{/if}>
        <div class="enemyFukiUnder">
           <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="600px">
        </div>
        <div class="enemyFukiText">
           <{$data['before_words']}><br />
        </div>
    </div>
</div>
