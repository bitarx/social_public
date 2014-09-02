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
           <img src="<{$smarty.const.IMG_URL}>tutorial/card_m_<{$data.card_id}>.jpg" width="160px">
    </div>
    <div class="cardName">
        <{if !empty($data.Card.card_title)}>
            <{$data.Card.card_title}><span style="color:#ffffff"><{$data.Card.card_name}></span>
        <{else}>
            <{$data.card_title}><span style="color:#ffffff"><{$data.card_name}></span>
        <{/if}>
    </div>
    <div class="cardAtk">
        攻撃:<span style="color:#ffffff"><{$data.atk}></span>
    </div>
    <div class="cardDef">
        防御:<span style="color:#ffffff"><{$data.def}></span>
    </div>
    <div class="cardExp">
        経験値:
    </div>
    <div id="progCardExp<{$key}>" class="progCardExp">
    </div>
    <div class="cardExpInt">
        <span style="color:#ffffff"><{$data.exp}> / 100</span>
    </div>

    <script type="text/javascript">
        dispProgressCardExp(<{$data.exp}>, <{$key}> );
    </script>

    <div class="cardLv">
        Lv.<span style="color:#ffffff"><{$data.level}></span>
    </div>
    <div class="cardSkillLv">
        スキルLv:<span style="color:#ffffff"><{$data.skill_level}></span>
    </div>
    <div class="cardSkillName">
        スキル:<span style="color:#ffffff">
        <{if $data.Skill.skill_name}>
            <{$data.Skill.skill_name}>
        <{else}>
            <{$data.skill_name}>
        <{/if}>
        </span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff">
        <{if $data.Skill.skill_words}>
            <{$data.Skill.skill_words}>
        <{else}>
            <{$data.skill_words}>
        <{/if}>
        </span>
    </div>

    <a href="<{$next}>">
            <div class="btnCommon">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCard">
                    進化させる
                </div>
            </div>
    </a>
</div>
    <div class="spaceSubject">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div style="position:absolute;left:130px;top:30px;font-size: 30px;">
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
