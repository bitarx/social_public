<div class="tutorials index">

    <{include file="../Elements/title.tpl"}>

    <div class="guide">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_<{$guideId}>.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="170px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnderL">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
            <{if empty($tutoEnd)}>
               <{$row['tutorial_words']}><br />
            <{else}>
            <{/if}>
            </div>
        </div>
    </div>

    <div class="spaceSubject">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div style="position:absolute; font-size:30px;left:140px; top:30px;">
            このカードを強化します
        </div>
        <div class="cardDetailNameUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>


    <div class="card">
        <div class="cardImg">
               <img src="<{$smarty.const.IMG_URL}>tutorial/card_m_13.jpg" width="160px">
        </div>
        <div class="cardName">
                [絶対美少女]<span style="color:#ffffff">つぼみ</span>
        </div>
        <div class="cardAtk">
            攻撃:<span style="color:#ffffff">100</span>
        </div>
        <div class="cardDef">
            防御:<span style="color:#ffffff">150</span>
        </div>
        <div class="cardExp">
            経験値:
        </div>
        <div id="progCardExp" class="progCardExp">
        </div>
        <div class="cardExpInt">
            <span style="color:#ffffff">0 / 100</span>
        </div>

        <script type="text/javascript">
            dispProgressCardExp(0, 0 );
        </script>

        <div class="cardLv">
            Lv.<span style="color:#ffffff">1</span>
        </div>
        <div class="cardSkillLv">
            スキルLv:<span style="color:#ffffff">1</span>
        </div>
        <div class="cardSkillName">
            スキル:<span style="color:#ffffff">
                アイドルマスタリー
            </span>
        </div>
    </div>
    <div class="btnGacha">
        <a href="<{$next}>">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="次へ" name="submit">
        <div class="strTutoNext">
           強化！ 
        </div>
        </a>
    </div>

    <div class="spaceSubject">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div style="position:absolute; font-size:30px;left:130px; top:30px" >
            このカードを素材にします
        </div>
        <div class="cardDetailNameUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>
    <div>
        <img src="<{$smarty.const.IMG_URL}>tutorial/card_l_<{$tutoSampleCard}>.jpg">
    </div>

    <div class="btnGacha">
        <a href="<{$next}>">
        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="次へ" name="submit">
        <div class="strTutoNext">
           強化！ 
        </div>
        </a>
    </div>

</div>
