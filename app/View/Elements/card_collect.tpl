<div class="card">
    <{if empty($data.card_id)}> 
        <div style="position:relative;left:50px;height:150px;">
            <div style="position:absolute;top:60px;">
                設定なし
            </div>
        </div>
    <{else}> 

            <div class="cardImg">
                <{if !empty($data.disp)}>
                    <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$data.card_id}>.jpg" width="150px">
                <{else}>
                    <img src="<{$smarty.const.IMG_URL}>noset.jpg" width="150px">
                <{/if}>
            </div>
            <div class="cardName">
                    <{$data.card_title}>
                    <{if $data.disp == 1 && empty($other)}>
                        <a href="<{$smarty.const.BASE_URL}>cards/index/<{$data.card_id}>">
                            <span style="color:#ffffff"><{$data.card_name}></span>
                        </a>
                    <{else}>
                        <span style="color:#ffffff"><{$data.card_name}></span>
                    <{/if}>
            </div>
            <div class="cardAtk">
                攻撃:<span style="color:#ffffff"><{if $data.disp == 1}><{$data.card_atk}><{else}>???<{/if}></span>
            </div>
            <div class="cardDef">
                防御:<span style="color:#ffffff"><{if $data.disp == 1}><{$data.card_def}><{else}>???<{/if}></span>
            </div>
            <{if $smarty.const.CARRER_IPHONE == $carrer}>
                <div class="cardHpIos">
                    HP:<span style="color:#ffffff"><{if $data.disp == 1}><{$data.card_hp}><{else}>???<{/if}></span>
                </div>
            <{else}>
                <div class="cardHp">
                    HP:<span style="color:#ffffff"><{if $data.disp == 1}><{$data.card_hp}><{else}>???<{/if}></span>
                </div>
            <{/if}>
            <{if !empty($data.created)}>
                <div class="cardExp">
                    取得日時:
                    <span style="color:#ffffff"><{$data.created}></span>
                </div>
            <{/if}>
            <div class="cardLv">
                属性:&nbsp;<{if $data.attr == 1}><span style="color:#FF1493">愛<{elseif $data.attr == 2}><span style="color:#90EE90">舞<{elseif $data.attr == 3}><span style="color:#1E90FF">魅<{/if}></span>
            </div>
            <div class="cardRareLevel">
                レアリティ:<{if $data.rare_level == 1}>
                                <span style="color:#ffffff">N</span>
                            <{elseif $data.rare_level == 2}>
                                <span style="color:#ffffff">HN</span>
                            <{elseif $data.rare_level == 3}>
                                <span style="color:#FF0000">R</span>
                            <{elseif $data.rare_level == 4}>
                                <span style="color:#FF0000">HR</span>
                            <{elseif $data.rare_level == 5}>
                                <span style="color:#FF0000">SR</span>
                            <{/if}>
            </div>

            <{if !empty($data.skill_name)}>
                <div class="cardSkillLvIos">
                    スキルLv:<span style="color:#ffffff"><{$data.skill_level}> / <{$smarty.const.SKILL_LEVEL_MAX}></span>
                </div>
            <{/if}>

    <{if !empty($data.Skill.skill_name) || !empty($data.skill_name)}>
        <div class="cardSkillName">
            スキル:<span style="color:#ffffff">
            <{if $data.Skill.skill_name}> 
                <{$data.Skill.skill_name}>
            <{elseif $data.skill_name}> 
                    <{$data.skill_name}>
            <{/if}> 
            </span>
        </div>
    <{/if}>
    <{if !empty($data.Skill.skill_name) || !empty($data.skill_name)}>
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
    <{if 'UserDeckCards' == $ctl}> 
        <div class="cardDeckCost">
            コスト:<span style="color:#ffffff">
            <{$data.card_cost}> 
            </span>
        </div>
    <{/if}>
    <{/if}> 

    <{* 強化合成素材カード選択 *}> 
    <{if 'UserCards' == $ctl && 'index' == $action}> 
        <{if isset($key) && $key <= 10}> 
            <{if $kind == 2}> 
                <a href="<{$smarty.const.BASE_URL}>UserCards/conf?user_card_id=<{$data.user_card_id}>">
                    <div class="btnSelectCard">
                        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                        <div class="strSelectCardSozai">
                            素材に選択
                        </div>
                    </div>
                </a>
            <{else}> 
                <div class="strSelectCardCheckBox">
                    選択=><input type="checkbox" name="user_card_id_<{$data.user_card_id}>" class="ckbox">
                </div>
            <{/if}> 
        <{/if}>

    <{* ベースカード選択 *}> 
    <{elseif 'UserBaseCards' == $ctl && 'index' == $action}> 
        <{if empty($data.sozai_kind)}>
            <div class="btnSelectCard">
                <a href="initBaseCard?user_card_id=<{$data.user_card_id}>">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="strSelectCard">
                        ベース選択
                    </div>
                </a>
            </div>
        <{/if}>

    <{* デッキ編成 *}> 
    <{elseif 'UserDeckCards' == $ctl && 'index' == $action}> 
        <{if !empty($data.user_card_id)}> 
                <div class="parent">
                   <a href="<{$smarty.const.BASE_URL}>UserDeckCards/delete?user_deck_id=<{$data.user_deck_id}>&deck_number=<{$data.deck_number}>">
                        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                        <div class="child">
                             外す
                        </div>
                    </a>
                </div>
                <div class="space"></div>
        <{/if}> 
            <div class="parent">
                <a href="<{$smarty.const.BASE_URL}>UserDeckCards/initList?user_deck_id=<{$data.user_deck_id}>&deck_number=<{$data.deck_number}>">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="child">
                        <{if !empty($data.user_card_id)}>変更<{else}>設定<{/if}>  
                    </div>
                </a>
            </div>
            <div class="space"></div>

    <{* デッキに設定 *}> 
    <{elseif 'UserDeckCards' == $ctl && 'initList' == $action && isset($key)}> 
        <div class="btnSelectCard">
            <a href="init?user_card_id=<{$data.user_card_id}><{$addParam}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="strSelectCard">
                   デッキ設定 
                </div>
            </a>
        </div>
    <{/if}> 

</div>
