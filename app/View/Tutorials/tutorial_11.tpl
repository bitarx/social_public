<div class="tutorials index">

    <{include file="../Elements/title.tpl"}>

    <{include file="../Elements/guide.tpl"}>

    <div class="card">
        <div class="cardImg">
               <img src="<{$smarty.const.IMG_URL}>tutorial/card_m_13.jpg" width="160px">
        </div>
        <div class="cardName">
                [絶対美少女]<span style="color:#ffffff">つぼみ</span>
        </div>
        <div class="cardAtk">
            攻撃:<span style="color:#ffffff">150</span>
        </div>
        <div class="cardDef">
            防御:<span style="color:#ffffff">200</span>
        </div>
        <div class="cardExp">
            経験値:
        </div>
        <div id="progCardExp1" class="progCardExp">
        </div>
        <div class="cardExpInt">
            <span style="color:#ffffff">20 / 100</span>
        </div>

        <script type="text/javascript">
            dispProgressCardExp(20, 1 );
        </script>

        <div class="cardLv">
            Lv.<span style="color:#ffffff">2</span>
        </div>
        <div class="cardSkillLv">
            スキルLv:<span style="color:#ffffff">1</span>
        </div>
        <div class="cardSkillName">
            スキル:<span style="color:#ffffff">
                アイドルマスタリー
            </span>
        </div>
        <div class="cardSkillEft">
            効果:<span style="color:#ffffff">
                自分の攻撃力を中アップ
            </span>
        </div>

    </div>

<br />

    <div class="guide">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_3.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="145px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnder">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               <{$row['tutorial_words2']}><br />
            </div>
        </div>
    </div>

    <{include file="../Elements/next.tpl"}>
</div>
