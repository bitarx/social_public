<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>   
    <div style="left:-41px;">
        <{if empty($raidEvent)}>
            <img src="<{$smarty.const.IMG_URL}>raid_quest/start.jpg">
        <{else}>
            <{include file="../Elements/sub_title.tpl"}>
            <div class="spaceLow"></div>
            <div style="text-align:center;font-size:30px;">
                <span style="color:#EE82EE"><{$eventStr}></span>
            </div>
            <{if !empty($topPercent)}>
                <div style="text-align:center;font-size:32px;">
                    現在上位<span style="color:#FFA500;"><{$topPercent}>％</span>
                </div>
            <{/if}>
            <div class="spaceLow"></div>
            <img src="<{$smarty.const.IMG_URL}>ev_raid/plorogue_<{$raidEvent.ev_raid_id}>.jpg">
            <div>
                <div class="eventTextArea">
                    <input type="image" src="<{$smarty.const.IMG_URL}>textarea.png" class="textAreaEventH">
                    <div class="eventStrH">
                        <{$raidEvent['detail']}> 
                    </div>
                </div>
            </div>
            <div class="raidText">
               <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="485px">
               <div class="childTop">
                   <div style="text-align:center">
                       <span style="color:#00FF00;"><イベントについて></span><br />
                   </div>
                   ■イベント期間内にレイドボス「舞奈」を討伐すると<span style="color:#FFA500;">討伐Pt</span>が獲得出来ます。<br />
                   ■ 討伐時1Pt取得できます。発見者だけでなく協力者も取得できます。<br />
                   ■舞奈を１体でも討伐すれば、<span style="color:#FFA500;">Rカード舞奈を取得</span>できます(討伐後受取BOXへ送られます)。<br />
                   ■イベントは期間の前半と後半のランキングの順位により報酬がGETできます。<br />
                   ■報酬の詳細は<a href="<{$linkRank}>"><span style="color:#1E90FF">こちら</span></a>をご確認ください。<br />
                   ■報酬は<span style="color:#FFA500;">イベント各期間終了後受取BOX</span>へ送られます。
               </div>
            </div>
            <div class="spaceLow"></div>
            <div style="text-align:center;font-size:30px;">
                <span style="color:#EE82EE"><{$eventStr}></span>
            </div>
            <{if !empty($topPercent)}>
                <div style="text-align:center;font-size:32px;">
                    現在上位<span style="color:#FFA500;"><{$topPercent}>％</span>
                </div>
            <{/if}>
            <div class="spaceLow"></div>
            <div style="text-align:center;font-size:24px;">
                ※ランキングは１時間に１回の更新です
            </div>
            <div class="spaceLow"></div>
            <div>
                <{foreach from=$rankList item=data}>
                    <{include file="../Elements/rank.tpl"}>
                    <div class="spaceHigh"></div>
                <{foreachelse}>
                    <div class="space"></div>
                    <div style="text-align:center;">
                    まだランクがありません
                    </div>
                <{/foreach}>
            </div>
        <{/if}>
    </div>
    <div class="spaceLow">
    </div>
    <{foreach from=$list item=val}> 
        <div>
            <div class="space">
            </div>
            <div style="font-size:30px;text-align:center;">
                <span style="color:#EE82EE">エリア<{$val['raid_quest_id']}></span>. <{$val['quest_title']}>
            </div>
                <div class="spaceLow">
                </div>
                  <div class="parent">
                      <a href="<{$smarty.const.BASE_URL}>RaidStages/index?quest_id=<{$val['raid_quest_id']}>"> 
                          <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
                          <div class="child">
                              <{$val['quest_title']}>へ
                          </div>
                      </a>
                  </div>
        </div>
        <div class="spaceLow">
        </div>
    <{/foreach}> 
    <div class="space"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/raidList"> 
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child">
                交戦中一覧
            </div>
        </a>
    </div>
    <div class="spaceLow"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/helpList"> 
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child">
                救援要請一覧
            </div>
        </a>
    </div>
    <div class="spaceLow"></div>
    <div class="parent">
        <a href="<{$smarty.const.BASE_URL}>RaidStages/helpSelfList"> 
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child">
                救援してくれた人一覧
            </div>
        </a>
    </div>
    <div class="space"></div>
    <div class="raidText">
       <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="485px">
       <div class="childTop">
           <div style="text-align:center">
               <span style="color:#00FF00;"><報酬について></span><br />
           </div>
           ■レイドボスを制限時間内に討伐すると、発見者、参加者共に「<{$smarty.const.MONEY_NAME}>」が送られます。<br />
           ■<{$smarty.const.MONEY_NAME}>の獲得数は<span style="color:#FFA500;">与えた総ダメージの１０分の１を参加人数で割った数が等しく分配</span>されます。<br />
           ■討伐した時に、一定の確率でアイテやカードが獲得できます<span style="color:#FFD700">(特別報酬)</span>。<br />
           ■レイドボスによっては、討伐したレイドボスの<span style="color:#FFA500;">レベルが高いほど、特別報酬を獲得できる確率が高く</span>なります。<br />
           ■討伐時報酬は、<span style="color:#FFA500;">発見者、参加者全員が獲得</span>できます。<br />
           ■ダメージを与えていない場合は報酬を獲得できません。<br />
           ■報酬は全て<span style="color:#FFA500;">受取BOXに送られます</span>。<br />
       </div>
    </div>
    <div class="space">
    </div>
</div>

