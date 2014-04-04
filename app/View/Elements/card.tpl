<script type="text/javascript">
$(function () {
    dispProgressQuestExp(<{$data.exp}>);
});
</script>
<div class="card">
    <div class="cardImg">
        <img src="<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$data.card_id}>" width="160px">
    </div>
    <div class="cardName">
        <{$data.Card.card_title}><span style="color:#ffffff"><{$data.Card.card_name}></span> 
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
    <div id="progQuestExp" class="progCardExp"></div>
    <div class="cardExpInt">
       <span style="color:#ffffff"><{$data.exp}> / 100</span>
    </div>
    <div class="cardLv">
        Lv.<span style="color:#ffffff"><{$data.level}></span>
    </div>
    <div class="cardSkillLv">
        スキルLv:<span style="color:#ffffff"><{$data.skill_level}></span>
    </div>
    <div class="cardSkillName">
        スキル:<span style="color:#ffffff"><{$data.Card.Skill.skill_name}></span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff"><{$data.Card.Skill.skill_words}></span>
    </div>
</div>
