<div class="card">
    <{if empty($data.user_card_id)}> 
        <div style="position:relative;left:50px;height:150px;">
            <div style="position:absolute;top:60px;">
                設定なし
            </div>
        </div>
    <{else}> 

        <{if $carrer == $smarty.const.CARRER_IPHONE}>
            <{* iPhone *}>
            <div class="cardImg">
                <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$data.card_id}>.jpg" width="150px">
            </div>
            <div class="cardName">
                <{if !empty($data.Card.card_title)}>
                    <{$data.Card.card_title}>
                    <a href="<{$smarty.const.BASE_URL}>cards/index/<{$data.Card.card_id}>">
                    <span style="color:#ffffff"><{$data.Card.card_name}></span>
                <{else}> 
                    <{$data.card_title}>
                    <a href="<{$smarty.const.BASE_URL}>cards/index/<{$data.card_id}>">
                    <span style="color:#ffffff"><{$data.card_name}></span>
                <{/if}> 
                </a>
            </div>
            <div class="cardAtk">
                攻撃:<span style="color:#ffffff"><{$data.atk}></span>
            </div>
            <div class="cardDef">
                防御:<span style="color:#ffffff"><{$data.def}></span>
            </div>
            <div class="cardHpIos">
                HP:<span style="color:#ffffff"><{$data.hp_max}></span>
            </div>
            <div class="cardExp">
                経験値:
            </div>
            <div id="progCardExp<{$key}>" class="progCardExpIos">
            </div>
            <div class="cardExpIntIos">
                <span style="color:#ffffff"><{if empty($data.exp)}>0<{else}><{$data.exp}><{/if}> / 100</span>
            </div>

            <script type="text/javascript">
                dispProgressCardExp(<{$data.exp}>, <{$key}> );
            </script>

            <div class="cardLvIos">
                Lv.<span style="color:#ffffff"><{$data.level}> / <{$data.card_level}></span><{if $data.card_level <= $data.level}>&nbsp;<span style="color:#FF0000">Max</span><{/if}>
            </div>
            <div class="cardRareLevel">
                レアリティ:<{if $data.rare_level == 1}>
                                <span style="color:#ffffff">N</span>
                            <{elseif $data.rare_level == 2}>
                                <span style="color:#ffffff">HN</span>
                            <{elseif $data.rare_level == 3}>
                                <span style="color:#FF0000">R</span>
                            <{elseif $data.rare_level == 4}>
                                <span style="color:#FFFF00">HR</span>
                            <{elseif $data.rare_level == 5}>
                                <span style="color:#EE82EE">SR</span>
                            <{/if}>
            </div>

            <{if !empty($data.Skill.skill_name) || !empty($data.skill_name)}>
                <div class="cardSkillLvIos">
                    スキルLv:<span style="color:#ffffff"><{$data.skill_level}> / <{$smarty.const.SKILL_LEVEL_MAX}></span>
                </div>
            <{/if}>
            <div class="cardComment">
                <{if empty($data.sozai_kind)}>
                    <{if empty($data.next)}>
                        <span style="color:#00FFFF">これ以上進化しません</span>
                    <{elseif $data.card_level <= $data.level}>
                        <span style="color:#EE82EE">同種カードで進化します！</span>
                    <{else}>
                        <span style="color:#00FF7F">レベルMax、同種カードで進化します</span>
                    <{/if}>
                <{/if}>
            </div>

        <{else}>
            <{* Android *}>
            <div class="cardImg">
                <img src="<{$smarty.const.IMG_URL}>card/card_m_<{$data.card_id}>.jpg" width="150px">
            </div>
            <div class="cardName">
                <{if !empty($data.Card.card_title)}>
                    <{$data.Card.card_title}>
                    <a href="<{$smarty.const.BASE_URL}>cards/index/<{$data.Card.card_id}>">
                    <span style="color:#ffffff"><{$data.Card.card_name}></span>
                <{else}> 
                    <{$data.card_title}>
                    <a href="<{$smarty.const.BASE_URL}>cards/index/<{$data.card_id}>">
                    <span style="color:#ffffff"><{$data.card_name}></span>
                <{/if}> 
                </a>
            </div>
            <div class="cardAtk">
                攻撃:<span style="color:#ffffff"><{$data.atk}></span>
            </div>
            <div class="cardDef">
                防御:<span style="color:#ffffff"><{$data.def}></span>
            </div>
            <div class="cardHp">
                HP:<span style="color:#ffffff"><{$data.hp_max}></span>
            </div>
            <div class="cardExp">
                経験値:
            </div>
            <div id="progCardExp<{$key}>" class="progCardExp">
            </div>
            <div class="cardExpInt">
                <span style="color:#ffffff"><{if empty($data.exp)}>0<{else}><{$data.exp}><{/if}> / 100</span>
            </div>

            <script type="text/javascript">
                dispProgressCardExp(<{$data.exp}>, <{$key}> );
            </script>

            <div class="cardLv">
                Lv.<span style="color:#ffffff"><{$data.level}> / <{$data.card_level}></span><{if $data.card_level <= $data.level}>&nbsp;<span style="color:#FF0000">Max</span><{/if}>
            </div>
            <div class="cardRareLevel">
                レアリティ:<{if $data.rare_level == 1}>
                                <span style="color:#ffffff">N</span>
                            <{elseif $data.rare_level == 2}>
                                <span style="color:#ffffff">HN</span>
                            <{elseif $data.rare_level == 3}>
                                <span style="color:#FF0000">R</span>
                            <{elseif $data.rare_level == 4}>
                                <span style="color:#FFFF00">HR</span>
                            <{elseif $data.rare_level == 5}>
                                <span style="color:#EE82EE">SR</span>
                            <{/if}>
            </div>

            <{if !empty($data.Skill.skill_name) || !empty($data.skill_name)}>
                <div class="cardSkillLv">
                    スキルLv:<span style="color:#ffffff"><{$data.skill_level}> / <{$smarty.const.SKILL_LEVEL_MAX}></span>
                </div>
            <{/if}>
            <div class="cardComment">
                <{if empty($data.sozai_kind)}>
                    <{if empty($data.next)}>
                        <span style="color:#00FFFF">これ以上進化しません</span>
                    <{elseif $data.card_level <= $data.level}>
                        <span style="color:#EE82EE">同種カードで進化します！</span>
                    <{else}>
                        <span style="color:#00FF7F">レベルMax、同種カードで進化します</span>
                    <{/if}>
                <{/if}>
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
                <div class="parent">
                    <a href="<{$smarty.const.BASE_URL}>UserCards/conf?user_card_id=<{$data.user_card_id}>">
                        <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                        <div class="child">
                            素材に選択
                        </div>
                    </a>
                </div>
            <{else}> 
                <div class="strSelectCardCheckBox">
                    <{if 2 != $data.sozai_kind}>
                      選択=><input type="checkbox" name="user_card_id_<{$data.user_card_id}>" class="ckbox">
                    <{/if}>
                </div>
            <{/if}> 
            <div class="spaceLow"></div>
        <{/if}>
    <{* 強化合成素材カード選択 *}> 
    <{elseif 'UserCards' == $ctl && 'cardList' == $action}> 

        <div class="space"></div>
    <{* ベースカード選択 *}> 
    <{elseif 'UserBaseCards' == $ctl && 'index' == $action}> 
        <{if empty($data.sozai_kind)}>
            <div class="parent">
                <a href="initBaseCard?user_card_id=<{$data.user_card_id}>">
                    <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                    <div class="child">
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
        <div class="parent">
            <{if empty($data.sozai_kind)}>
            <a href="<{$smarty.const.BASE_URL}>UserDeckCards/init?user_card_id=<{$data.user_card_id}><{$addParam}>">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png">
                <div class="child">
                   デッキ設定 
                </div>
            </a>
            <{/if}>
        </div>
        <div class="space"></div>
    <{/if}> 

</div>
