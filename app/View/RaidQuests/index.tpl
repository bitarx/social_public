<div class="quest">
    <div style="left:-40px;">
        <img src="<{$smarty.const.IMG_URL}>quest/start.jpg">
    </div>
    <div class="spaceLow">
    </div>
    <{foreach from=$list item=val}> 
        <div>
            <div class="space">
            </div>
            <div style="font-size:30px;text-align:center;">
                <span style="color:#EE82EE">鎮激<{$val['raid_quest_id']}></span>. <{$val['quest_title']}>
            </div>
                <div class="spaceLow">
                </div>
                 <div class="questText">
                    <input type="image" src="<{$smarty.const.IMG_URL}>textarea.png" class="textAreaStageImg">
                    <div class="strQuestList">
                        <{$val['quest_detail']}> 
                    </div>
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
    <div class="space">
    </div>
</div>
