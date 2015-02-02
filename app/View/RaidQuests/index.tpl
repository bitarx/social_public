<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>   
    <div style="left:-41px;">
        <img src="<{$smarty.const.IMG_URL}>raid_quest/start.jpg">
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
           ■討伐した時に、一定の確率でアイテやカードが獲得できます。<br />
           ■レイドボスによっては、討伐したレイドボスの<span style="color:#FFA500;">レベルが高いほど、特別アイテムを獲得できる確率が高く</span>なります。<br />
           ■討伐時報酬は、<span style="color:#FFA500;">発見者、参加者全員が獲得</span>できます。<br />
           ■ダメージを与えていない場合は報酬を獲得できません。<br />
           ■報酬は全て<span style="color:#FFA500;">受取BOXに送られます</span>。<br />
       </div>
    </div>
    <div class="space">
    </div>
</div>

