<div class="cardListImg">
   <img src="<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$data.card_id}>" width="160px">
</div>
<div class="cardList">
    <div class="cardListName">
        <{if !empty($data.Card.card_title)}>
            <{$data.Card.card_title}><{$data.Card.card_name}>
        <{else}> 
            <{$data.card_title}><{$data.card_name}>
        <{/if}> 
    </div>
    <div class="cardListAtk">
        攻撃:<{$data.atk}>
    </div>
    <div class="cardListDef">
        防御:<{$data.def}>
    </div>
    <div class="cardListExp">
        経験値:
    </div>
    <div class="progCardListExp">
    </div>
    <div id="progCardExp<{$key}>" class="progCardListExpBar">
    </div>
    <div class="cardListExpInt">
        <{$data.exp}> / 100
    </div>

    <script type="text/javascript">
        dispProgressCardExp(<{$data.exp}>, <{$key}> );
    </script>

    <div class="cardListLv">
        Lv.<span style="color:#ffffff"><{$data.level}></span>
    </div>
    <div class="cardListSkillLv">
        スキルLv:<span style="color:#ffffff"><{$data.skill_level}></span>
    </div>
    <div class="cardListSkillName">
        スキル:<span style="color:#ffffff">
        <{if $data.Card.Skill.skill_name}> 
            <{$data.Card.Skill.skill_name}>
        <{else}> 
            <{$data.Skill.skill_name}>
        <{/if}> 
        </span>
    </div>
    <div class="cardListSkillEft">
        効果:<span style="color:#ffffff">
        <{if $data.Card.Skill.skill_name}> 
            <{$data.Card.Skill.skill_words}>
        <{else}> 
            <{$data.Skill.skill_words}>
        <{/if}> 
        </span>
    </div>
</div>
