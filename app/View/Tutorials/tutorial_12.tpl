<div class="tutorials index">
    <div class="bannerTitle">
        <img src="<{$smarty.const.IMG_URL}>banner_title.png">
            <div class="strTitleSynth" >
               ボス戦！
            </div>
    </div>

    <div> 
        <img src="<{$smarty.const.IMG_URL}>tutorial/enemy_0.png">
    </div>

    <{include file="../Elements/before_words.tpl"}>

    <div class="btnGacha">
        <a href="<{$next}>">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_s.png" alt="鎮激！" name="submit">
        <div class="strTutoNext">
            鎮激！
        </div>
        </a>
    </div>

    <div class="guide">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_3.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="207px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnderXL">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               <{$row['tutorial_words2']}><br />
            </div>
        </div>
    </div>

</div>
<br />
