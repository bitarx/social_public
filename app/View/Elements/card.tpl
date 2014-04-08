<div class="card">
    <div class="cardImg">
       <img src="<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$data.card_id}>" width="160px">
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
        <{if $data.Card.Skill.skill_name}> 
            <{$data.Card.Skill.skill_name}>
        <{else}> 
            <{$data.Skill.skill_name}>
        <{/if}> 
        </span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff">
        <{if $data.Card.Skill.skill_name}> 
            <{$data.Card.Skill.skill_words}>
        <{else}> 
            <{$data.Skill.skill_words}>
        <{/if}> 
        </span>
    </div>

    <{if isset($key)}> 
        <a href="<{$smarty.const.BASE_URL}>UserCards/conf?user_card_id=<{$data.user_card_id}>">
            <div class="btnSelectCard">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCardSozai">
                    素材に選択
                </div>
            </div>
        </a>
    <{/if}> 

</div>
