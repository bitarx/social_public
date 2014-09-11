<div class="card">
    <{if empty($data.user_card_id)}> 
        <div style="position:relative;left:50px;height:150px;">
            <div style="position:absolute;top:60px;">
                設定なし
            </div>
        </div>
    <{else}> 
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
        Lv.<span style="color:#ffffff"><{$data.level}></span><{if $data.card_level <= $data.level}>&nbsp;<span style="color:#FF0000">Max</span><{/if}>
    </div>
    <div class="cardSkillLv">
        スキルLv:<span style="color:#ffffff"><{$data.skill_level}></span>
    </div>
    <div class="cardSkillName">
        スキル:<span style="color:#ffffff">
        <{if $data.Skill.skill_name}> 
            <{$data.Skill.skill_name}>
        <{else}> 
            <{if empty($data.skill_name)}>
               なし
            <{else}>
                <{$data.skill_name}>
            <{/if}>
        <{/if}> 
        </span>
    </div>
    <div class="cardSkillEft">
        効果:<span style="color:#ffffff">
        <{if $data.Skill.skill_words}> 
            <{$data.Skill.skill_words}>
        <{else}> 
            <{if empty($data.skill_words)}>
                なし
            <{else}>
                <{$data.skill_words}>
            <{/if}>
        <{/if}> 
        </span>
    </div>
    <{/if}> 

    <{* 強化合成素材カード選択 *}> 
    <{if 'UserCards' == $ctl && 'index' == $action}> 
        <{if isset($key) && $key <= 10}> 
            <{if $kind == 2}> 
                <a href="<{$smarty.const.BASE_URL}>UserCards/conf?user_card_id=<{$data.user_card_id}>">
                    <div class="btnSelectCard">
                        <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                        <div class="strSelectCardSozai">
                            素材に選択
                        </div>
                    </div>
                </a>
            <{else}> 
                <div class="strSelectCardCheckBox">
                    選択=><input type="checkbox" name="user_card_id_<{$data.user_card_id}>">
                </div>
            <{/if}> 
        <{/if}>

    <{* ベースカード選択 *}> 
    <{elseif 'UserBaseCards' == $ctl && 'index' == $action}> 
        <a href="initBaseCard?user_card_id=<{$data.user_card_id}>">
            <div class="btnSelectCard">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCard">
                    ベース選択
                </div>
            </div>
        </a>

    <{* デッキ編成 *}> 
    <{elseif 'UserDeckCards' == $ctl && 'index' == $action}> 
        <{if !empty($data.user_card_id)}> 
            <form method="get" action="<{$smarty.const.BASE_URL}>UserDeckCards/delete">
                <div class="btnSelectCardInUserDeckLeft">
                    <input type="hidden" name="user_deck_id" value="<{$data.user_deck_id}>">
                    <input type="hidden" name="deck_number" value="<{$data.deck_number}>">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_s.png">
                    <div class="strSelectCardInUserDeck">
                        外す
                    </div>
                </div>
            </form>
        <{/if}> 
        <form method="get" action="<{$smarty.const.BASE_URL}>UserDeckCards/initList">
            <div class="btnSelectCardInUserDeckRight">
                <input type="hidden" name="user_deck_id" value="<{$data.user_deck_id}>">
                <input type="hidden" name="deck_number" value="<{$data.deck_number}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_s.png">
                <div class="strSelectCardInUserDeck">
                    <{if !empty($data.user_card_id)}>変更<{else}>設定<{/if}>  
                </div>
            </div>
        </form>

    <{* デッキに設定 *}> 
    <{elseif 'UserDeckCards' == $ctl && 'initList' == $action && isset($key)}> 
        <a href="init?user_card_id=<{$data.user_card_id}><{$addParam}>">
            <div class="btnSelectCard">
                <img src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCard">
                   デッキ設定 
                </div>
            </div>
        </a>
    <{/if}> 

</div>
