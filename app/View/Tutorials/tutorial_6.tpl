<div class="tutorials index">

    <{include file="../Elements/title.tpl"}>

    <{include file="../Elements/guide.tpl"}>


    <div class="spaceSubject">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div class="strCardDetailName" >
            カードを進化させます
        </div>
        <div class="cardDetailNameUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>


    <div class="card">
        <div class="cardImg">
               <img src="<{$smarty.const.IMG_URL}>tutorial/card_m_31.jpg" width="160px">
        </div>
        <div class="cardName">
                [ゆとり育ち]<span style="color:#ffffff">結依</span>
        </div>
        <div class="cardAtk">
            攻撃:<span style="color:#ffffff">800</span>
        </div>
        <div class="cardDef">
            防御:<span style="color:#ffffff">1000</span>
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
            Lv.<span style="color:#ffffff">20</span>
            <span style="color:#ff0000">Max</span>
        </div>
        <div class="cardSkillLv">
            スキルLv:<span style="color:#ffffff">1</span>
        </div>
        <div class="cardSkillName">
            スキル:<span style="color:#ffffff">
                サークルクラッシュ
            </span>
        </div>
        <div class="cardSkillEft">
            効果:<span style="color:#ffffff">
                相手の防御力を小ダウン
            </span>
        </div>

        <a href="<{$next}>">
                <div class="btnCommon">
                    <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strGacha">
                        進化させる
                    </div>
                </div>
        </a>
    </div>

    <div class="spaceSubject">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div class="strSozai">
            このカードを素材にします
        </div>
        <div class="cardDetailNameUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>
</div>
<div>
    <img src="<{$smarty.const.IMG_URL}>tutorial/card_l_31.jpg">
</div>
        <a href="<{$next}>">
                <div class="btnCommon">
                    <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strGacha">
                        進化させる
                    </div>
                </div>
        </a>
